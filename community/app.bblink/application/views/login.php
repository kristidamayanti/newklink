<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$css_tag = array(
          'href' => 'css/board.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'charset'=>'utf-8',
);

echo link_tag($css_tag)."\n";
?>
<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

</style>

<div class="container">
<div class="form-signin">
    <h2 class="form-signin-heading">Please sign in</h2>
    <?php
    echo form_open('auth/in')."\n";
    $user = array(
        'name'        => 'username',
        'id'          => 'username',
        'class'       => 'input-block-level',
        'placeholder' => 'User Name'
    );

    echo form_input($user)."\n";

    $pass = array(
        'name'        => 'password',
        'id'          => 'password',
        'class'       => 'input-block-level',
        'placeholder' => 'Password'
    );

    echo form_password($pass)."\n";

    echo "<label class='checkbox'>";
    echo "<input type='checkbox' value='remember-me'> Remember me";
    echo "</label>";

    $submit = array(
		"type" =>"submit",
		"name" =>"submit",
		"value" => "Sign in",
		"class" =>"btn btn-large btn-primary",
    );

    
    echo form_submit($submit)."\n";

    if($mssg != NULL):
        echo $mssg;
    else:
        echo NULL;
    endif;
    
    echo form_close();
    ?>
</div>
</div>
