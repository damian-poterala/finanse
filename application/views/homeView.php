<style>

    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background: url('https://i.pinimg.com/originals/ea/3f/d3/ea3fd3102ccf575e3c33954f73eab78d.jpg') no-repeat;
        background-size: cover;
    }

    .loginContainer {
        width: 280px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
    }

    .loginContainer h1 {
        float: left;
        font-size: 40px;
        border-bottom: 6px solid #4CAF50;
        margin-bottom: 50px;
        padding: 13px 0;
    }

    .textbox {
        width: 100%;
        overflow: hidden;
        font-size: 20px;
        padding: 8px 0;
        margin: 8px 0;
        border-bottom: 1px solid #4CAF50;
    }

    .textbox i {
        width: 26px;
        float: left;
        text-align: center;
    }

    .textbox input {
        border: none;
        outline: none;
        background: none;
        color: #fff;
        font-size: 18px;
        width: 80%;
        float: left;
        margin: 0 10px;
    }

    .btnLogin {
        width: 100%;
        background: none;
        border: 2px solid #4CAF50;
        color: #fff;
        padding: 5px;
        font-size: 18px;
        cursor: pointer;
        margin: 12px 0;
        transition: all 300ms;
    }

    .btnLogin:hover {
        background: #4CAF50;
        color: #fff;
        transition: all 300ms;
    }

    .btnRegistry {
        width: 100%;
        background: none;
        border: 2px solid #4CAF50;
        color: #fff;
        padding: 5px;
        font-size: 18px;
        cursor: pointer;
        margin: 12px 0;
        transition: all 300ms;
    }

    .btnRegistry:hover {
        background: #4CAF50;
        color: #fff;
        transition: all 300ms;
    }

    .errorLogin, .errorPassword {
        color: red;
        font-size: 12px;
    }
    
</style>
<body>
    <div class="loginContainer">
        <h1>LOGOWANIE</h1>
        <form action="<?php echo base_url(); ?>loginValidation" method="POST">
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" name="login" placeholder="Login">
            </div>
            <span class="errorLogin"><?php echo form_error('login'); ?></span>
            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Hasło">
            </div>
            <span class="errorPassword"><?php echo form_error('password'); ?></span>
            <input type="submit" value="Zaloguj" class="btnLogin">
            <?php echo $this->session->flashdata('error'); ?>
        </form>
        <br />
        <a href="<?php echo base_url().'registration'; ?>">
            <input type="submit" name="" value="Rejestracja" class="btnRegistry">
        </a>
        <br />
    </div>
    <script src="https://kit.fontawesome.com/55ab1bb525.js" crossorigin="anonymous"></script>
</body>