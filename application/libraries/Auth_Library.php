<?php
/* 
 * Author: Faraz Ali
 * Date: 28-Oct-2016
 * Time: 8:11 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * 
 * @name        Auth Library
 * @author      Faraz Ali <farazasifali @ gmail.com> 
 * @version     1.0v
 * @sence       1.0v
 * 
 * Auth Library:
 *      This libray deals with the all aspects of user login
 *  there are pre build functions that helps to get user login
 *  or logout and give access to the login user details.
 * 
 */
class Auth_Library
{
    //Property to store Codeigniter instance
    private $CI;
    
    /*
     * Fuction that run first and store Codegniter
     * instance into class property 
     * name $CI
     */
    public function __construct() {
        
        //Storing CI instance to property
        $this->CI =& get_instance();
    }
    
    /*
     * Fuction that check is any user is login or not
     * @return returns true if user is logged in and false if not
     */
    public function is_login()
    {
        //Check is user session is already set or not
        $user = $this->CI->session->userdata('admin');
        if(isset($user['login']) && $user['login'] === true)
        {
            //If user is already login return true
            return true;
        }
        //If user isn't login return false
        return false;
    }
    
    /*
     * Function that stores user current url
     * and redirect user to login page
     * to get user login.
     */
    public function getLogin()
    {
        $requestUrl = "http://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
        $this->CI->session->set_userdata('login_redirect_url', $requestUrl);
        redirect(site_url('Login'));
    }
    
    /*
     * Function that runs when user is 
     * athenticated and get him successfully
     * login to the system
     */
    public function loginSuccess($object)
    {
        // Stores User personal data into session
        $user = array(
            "login" => true,
            "name" => $object->user_fullname,
            "username" => $object->username,
            "email" => $object->user_email,
            "contact" => $object->user_contact,
            "address" => $object->user_address,
            "city" => $object->user_city,
            "country" => $object->user_country,
            "role" => $object->user_role,
            "avatar" => $object->user_avatar
        );
        $this->CI->session->set_userdata('admin', $user);
        
        //Retriving the url from which they landed for login
        $loginRedirect = $this->CI->session->userdata('login_redirect_url');
        if($loginRedirect)
        {
            $this->CI->session->unset_userdata('login_redirect_url');
            
            //redirect to url which was before login
            redirect($loginRedirect);
        }
        
        //redirect to main site url if user directly comes to login page
        redirect(site_url());
    }
    
    /*
     * Function that runs if user is not athenticate
     * @param $username and $password from submit form
     */
    public function loginFail($username, $password)
    {
        //Check if username and password is empty
        if($username && $password)
        {
            //Set alert message if username and password is present
            setMessage("error", "Username and password not match.");
        } else {
            //Set alert message if username and password is empty
            setMessage("error", "Username and password is required.");
        }
        //Redirect to login page for retry
        redirect(site_url("Login"));
    }
    
    /*
     * Function that logout user successfully
     */
    public function logout()
    {
        //Unset user session
        $this->CI->session->unset_userdata('admin');
        //Set logout alert message
        setMessage("success", "Successfully Logged You Out.");
        //redirect user to login form
        redirect(site_url("Login"));
    }
}