<br/>
<div class = "main_img center" > <img class = "shadow" src = "/resources/img/main_img/register.png" alt = "main_img" > </div>
<br />
<h2 class = "center" > Регистрация </h2>
<br />

<div class = "content_text center" >
	<form action = "register" method="post">
		<p><h3>Логин:</h3><input name="login" type="text" ></input></p>
		<p><h3>Пароль:</h3><input name="password" type="password"></p>
		<p><h3>Повторите пароль:</h3><input name="password_to" type="password"></p><br>
		
		<!--
		<p><h3> Электронная почта:</h3></p>
		<p><i> Необходимо для восстановления пароля (не обязательно) </i><br> 
		<p><input name="mail" type="e-mail"><br></p>
        -->

		<p><h3>Проверчный код:</h3></p>
		<p><img src = "/resources/captcha.php" /></p>
		<p><input class = "captcha" name = "captcha" type = "text"  /></p>

        <!--
        <div class="captcha">
            <div class="g-recaptcha" data-sitekey="6LfhqBYTAAAAALFYNPtQV6gJMvr_vzq3GANM-06g"></div>
        </div>
        -->

		<p><input name="submit" type="submit" value="Зарегистрироваться"></p>     
	</form><br>
</div>