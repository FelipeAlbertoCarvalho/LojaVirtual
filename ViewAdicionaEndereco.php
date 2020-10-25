
<br>
<h2 class="text-center">Adicionar Endereço de Entrega</h2>
<br>

<form method="POST" action="<?php echo BASE_URL; ?>endereco/criarEnderecoEntrega">
  
<div class="row">
    <div class="col-md-6 m-auto">

      <div class="form-group">
        <label>Cep:</label>
        <input class="form-control" name="cep" type="text" id="cep" value="" size="10" maxlength="9"
              onblur="pesquisacep(this.value);" />
      </div>
      <div class="form-group">
        <label>Rua:</label>
        <input class="form-control" name="rua" type="text" id="rua" size="60" />
      </div>
      <div class="form-group">
        <label>Complemento:</label>
        <input class="form-control" name="complemento" type="text" id="complemento" size="60" />
      </div>
      <div class="form-group">
        <label>Numero:</label>
        <input class="form-control" name="numero"  type="text" id="numero" size="60" />
      </div>
      <div class="form-group">
        <label>Bairro:</label>
        <input class="form-control" name="bairro" type="text" id="bairro" size="40" />
      </div>
      <div class="form-group">
        <label>Cidade:</label>
        <input class="form-control" name="cidade" type="text" id="cidade" size="40" />
      </div>
      <div class="form-group">
        <label>Estado:</label>
        <input class="form-control" name="uf" type="text" id="uf" size="2" />
      </div>
      <button id="btn_enviar" disabled class="btn btn-primary" type="submit"> Adicionar Endereço </button>

    </div>
  </div>
</form>
