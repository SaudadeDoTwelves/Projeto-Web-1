<div class="form">
    <h1>Entrar</h1>
    <form action="userlogin.php" method="post">
        <div class="user-data">
            <input type="text" name="usuario" size="10" maxlength="10" required>
            <span></span>
            <label>Usuário</label>
        </div>
        <div class="user-data">
            <input type="password" name="senha" size="8" maxlength="8" required>
            <span></span>
            <label>Senha</label>
        </div>
        <div class="pwd">
            <p>Esqueceu sua senha?</p>
        </div>
        <input type="submit" value="Entrar">
        <div class="cadastro">
            Não é membro? <a href="cadastro.php">Cadastre-se</a>
        </div>
    </form>
</div>