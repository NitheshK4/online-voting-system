import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import java.io.PrintWriter;

@WebServlet("/EditCandidate")
public class EditCandidate extends HttpServlet {
    private static final long serialVersionUID = 1L;
    private static final Logger LOGGER = Logger.getLogger(EditCandidate.class.getName());
    
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        
        HttpSession session = request.getSession();
        if (session.getAttribute("user") == null) {
            response.sendRedirect("login.jsp");
            return;
        }
        
        String idParam = request.getParameter("candidateID");
        if (idParam == null || idParam.isEmpty()) {
            out.println("<h3>Error: Invalid Candidate ID</h3>");
            return;
        }
        
        int candidateID = Integer.parseInt(idParam);
        String studnum = request.getParameter("studnum");
        String fname = request.getParameter("fname");
        String lname = request.getParameter("lname");
        String gender = request.getParameter("gender");
        String course = request.getParameter("course");
        String yearlvl = request.getParameter("yearlvl");
        String position = request.getParameter("position");
        String partylist = request.getParameter("partylist");
        String image = request.getParameter("image");
        
        // Check for empty fields
        if (studnum.isEmpty() || fname.isEmpty() || lname.isEmpty() || gender.isEmpty() ||
            course.isEmpty() || yearlvl.isEmpty() || position.isEmpty() || partylist.isEmpty() || image.isEmpty()) {
            out.println("<h3>Error: Please fill in all required fields!</h3>");
            return;
        }

        try (Connection conn = DatabaseUtil.getConnection()) {
            String query = "UPDATE candidates SET studnum=?, fname=?, lname=?, gender=?, course=?, yearlvl=?, position=?, partylist=?, image=? WHERE candidateID=?";
            PreparedStatement stmt = conn.prepareStatement(query);
            stmt.setString(1, studnum);
            stmt.setString(2, fname);
            stmt.setString(3, lname);
            stmt.setString(4, gender);
            stmt.setString(5, course);
            stmt.setString(6, yearlvl);
            stmt.setString(7, position);
            stmt.setString(8, partylist);
            stmt.setString(9, image);
            stmt.setInt(10, candidateID);
            
            int rowsUpdated = stmt.executeUpdate();
            if (rowsUpdated > 0) {
                out.println("<h3>Record updated successfully!</h3>");
            } else {
                out.println("<h3>No results found!</h3>");
            }
        } catch (Exception e) {
            LOGGER.log(Level.SEVERE, "Database error", e);
            out.println("<h3>Error: " + e.getMessage() + "</h3>");
        }
    }

    protected void doGet(HttpServletRequest request, HttpServletResponse response) 
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        
        HttpSession session = request.getSession();
        if (session.getAttribute("user") == null) {
            response.sendRedirect("login.jsp");
            return;
        }

        out.println("<html><head><title>Edit Candidate</title></head><body>");
        out.println("<h2>Edit Candidate Form</h2>");
        out.println("<form action='EditCandidate' method='post'>");
        out.println("Candidate ID: <input type='text' name='candidateID'><br>");
        out.println("Student Number: <input type='text' name='studnum'><br>");
        out.println("First Name: <input type='text' name='fname'><br>");
        out.println("Last Name: <input type='text' name='lname'><br>");
        out.println("Gender: <select name='gender'><option value='Male'>Male</option><option value='Female'>Female</option></select><br>");
        out.println("Course: <input type='text' name='course'><br>");
        out.println("Year Level: <input type='text' name='yearlvl'><br>");
        out.println("Position: <input type='text' name='position'><br>");
        out.println("Partylist: <input type='text' name='partylist'><br>");
        out.println("Image URL: <input type='text' name='image'><br>");
        out.println("<input type='submit' value='Save Changes'>");
        out.println("</form>");
        out.println("</body></html>");
    }
}

// Utility class to handle database connections
class DatabaseUtil {
    private static final String DB_URL = "jdbc:mysql://localhost:3306/your_database";
    private static final String DB_USER = "root";
    private static final String DB_PASS = "password";
    
    public static Connection getConnection() throws Exception {
        Class.forName("com.mysql.cj.jdbc.Driver");
        return DriverManager.getConnection(DB_URL, DB_USER, DB_PASS);
    }
}
