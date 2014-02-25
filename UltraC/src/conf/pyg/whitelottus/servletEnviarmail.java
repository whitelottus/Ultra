
/**
 *
 * @author Whitelottus
 */

import java.util.*;
import javax.mail.*;
import javax.mail.internet.*;
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet(name = "servletEnviarmail", urlPatterns = {"/servletEnviarmail"})

public class servletEnviarmail extends HttpServlet {
    
     protected void doPOST(HttpServletRequest request, HttpServletResponse response)
             throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        PrintWriter out = response.getWriter();
        String mensaje="no enviado";
        
         try {
      
         String nombre= request.getParameter("nombre");
         String mail= request.getParameter("mail");
         String asunto= request.getParameter("asunto");
        String contenido= request.getParameter("contenido");
         
   
       
     
      // mail del receptor
      String destino = "forcelottus@gmail.com";
      // cambiar host
      String host = "localhost";
      //obtener propiedades del sistema
      Properties properties = System.getProperties();
      // servidor del correo
      properties.setProperty("smtp.gmail.com", host);
      // obtener la sesion por default
      Session session = Session.getDefaultInstance(properties);
      try{
         // Crear el objeto del mensaje
         MimeMessage message = new MimeMessage(session);
         // ubicar desde donde viene el envio
         message.setFrom(new InternetAddress(mail));
         // enviado a
         message.addRecipient(Message.RecipientType.TO,
                                  new InternetAddress(destino));
         // crear el objeto del asunto
         message.setSubject(asunto);
         // mandar el mensaje de texto simple
          message.setText(contenido);
         // Envia mensaje
         Transport.send(message);
         System.out.println("vientos chavo");
      }catch (MessagingException mex) {
         mex.printStackTrace();
      }
   }catch (Exception e){
        
        System.out.println(e.getMessage());
    }
     }
}
    
