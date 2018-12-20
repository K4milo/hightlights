<?php
class PQRS_Module_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function postAction()
    {
        $post = $this->getRequest()->getPost();

        if ($post){
            try {

                $tipo = $POST["tipo"];
                $acerca = $POST["acerca"];
                $name = $POST["name"];
                $surname = $POST["surname"];
                $tipodocu = $POST["tipodocu"];
                $numdocu = $POST["numdocu"];
                $empresa = $POST["empresa"];
                $email = $POST["email"];
                $telephone = $POST["telephone"];
                $ciudad = $POST["ciudad"];
                $profesion = $POST["profesion"];
                $temas = $POST["temas"];
                $comment = $POST["comment"];


                $to = "example@example.co.uk";
                $subject = "example Brochure Request";
                $body .= "<p>Nuevo PQRS.</p>";
                $body .= "<p>Nombre : " . $name . "<p>";
                $body .= "<p>Apellido :" . $surname . "</p>";
                $body .= "<p>Email  : " . $email . "<p>";
                $body .= "<p>Tipo :" . $tipo . "</p>";
                $body .= "<p>Acerca :" . $acerca . "</p>";                
                $body .= "<p>Tipo Documento :" . $tipodocu . "</p>";
                $body .= "<p>Número Documento :" . $numdocu . "</p>";
                $body .= "<p>Empresa :" . $empresa . "</p>";
                $body .= "<p>Teléfono :" . $telephone . "</p>";
                $body .= "<p>Ciudad :" . $ciudad . "</p>";
                $body .= "<p>Profesión :" . $profesion . "</p>";
                $body .= "<p>Temas :" . $temas . "</p>";
                $body .= "<p>Comentario :" . $comment . "</p>";
                

                $body .= "<br/><p>Cordial Saludo</p>";

                $from = $email;

                $mail = Mage::getModel('core/email');
                $mail->setToName('Your Name');
                $mail->setToEmail($to);
                $mail->setBody('Mail Text / Mail Content');
                $mail->setSubject($subject);
                $mail->setFromEmail($from);
                $mail->setType('html');// YOu can use Html or text as Mail format
                $mail->setBodyHTML($body);  // your content or message

                $mail->send();

                Mage::getSingleton('core/session')->addSuccess('Su PQRS se ha enviado correctamente.');
                $this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
                Mage::getSingleton('core/session')->addError('Error al enviar su PQRS intente nuevamente');
                $this->_redirect('*/*/');
                return;
            }
        } else {
            $this->_redirect('*/*/');
        }
    }
}