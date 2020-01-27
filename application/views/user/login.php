<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
       <?php if($this->session->flashdata()): ?>
            <?=$this->session->flashdata('message');?>
        <?php endif;?>


        <?php if(validation_errors()):?>
            <?=validation_errors();?>
        <?php endif;?>

        <form method="POST" action="<?=base_url();?>user/authLogin">
            <table>
            <tr>
                <td><label for="email">Username</label></td>
                <td><input type="email" name="email" id="email" placeholder="Email"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" id="password" placeholder="Password"></td>
            </tr>   
            </table>
                <button class="btn btn-primary" type="submit">Login</button>
        </form>
        
</body>
</html>
