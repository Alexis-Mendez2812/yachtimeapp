<?php

/**
 * /application/core/MY_Loader.php
 *
 */
class MY_Loader extends CI_Loader {

    public function template($template_name, $vars = array(), $return = FALSE)
    {
        if($return):

        $content  = $this->view('header', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view('footer', $vars, $return);

        return $content;
    else:
       

        $this->view('header', $vars);
        $this->view($template_name, $vars);
        $this->view('footer', $vars);
    endif;
    }


    public function dashboard($template_name, $vars = array(), $return = FALSE){
        if($return){

            $content  = $this->view('dashboard/header', $vars, $return);
            $content .= $this->view('/'. $template_name, $vars, $return);
            $content .= $this->view('dashboard/footer', $vars, $return);

            return $content;
        }else{
           

            $this->view('dashboard/header', $vars);
            $this->view('/'.$template_name, $vars);
            $this->view('dashboard/footer', $vars);
        }
    }


}