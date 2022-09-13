<div class="form">
    <h1>CADASTRAR-SE</h1>
    <form action="cadastro.php" method="post">
        <div class="user-data">
            <input type="text" name="usuario" size="10" maxlength="10" required>
            <span></span>
            <label>Usuário</label>
        </div>
        <div class="user-data">
            <input type="text" name="nome" size="10" maxlength="10" required>
            <span></span>
            <label>Nome</label>
        </div>
        <div class="user-data">
            <input type="password" name="senha1" size="8" maxlength="8" required>
            <span></span>
            <label>Senha</label>
        </div>
        <div class="user-data">
            <input type="password" name="senha2" size="8" maxlength="8" required>
            <span></span>
            <label>Confirme a senha</label>
        </div>
        <input type="submit" value="Cadastrar">
    </form>
</div>