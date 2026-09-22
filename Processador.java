import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;


public class Processador{

    public static void main(String[] args) {
        
        try {
            
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/Projeto_Dev_Poliglota", "root", "");

            Statement stmt = con.createStatement();

            ResultSet rs = stmt.executeQuery("SELECT * FROM alunos WHERE  matricula = 'Pendente' LIMIT 1");

            if(rs.next()){

                int id = rs.getInt("id");

                String nome = rs.getString("nome").toUpperCase();

                String matriculaFicticia = "MAT-" + (1000 + id);

                String sql = "UPDATE alunos SET nome = ? , matricula = ?  WHERE id = ?";

                PreparedStatement ps = con.prepareStatement(sql);
                ps.setString(1, nome);
                ps.setString(2, matriculaFicticia);
                ps.setInt(3, id);
                ps.executeUpdate();

                System.out.println("SQL gerado: " + sql);
                                    
                System.out.println("Java processou o aluno: " + nome + " |Matrícula: " + matriculaFicticia);
            } else {

                System.out.println("Nenhum aluno pendente para processar.");


            }

            con.close();

        }catch(SQLException e) {
            System.out.println("Erro: " + e.getMessage());
        }
    
    }

}