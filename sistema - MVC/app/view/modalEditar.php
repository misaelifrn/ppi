<div id="modalEditar" class="modal">
</div>
<div class="modal-conteudo" id="modalConteudo">
    <h2>Editar tarefa</h2>
    <form action="index.php?action=editar" method="POST">
        <input type="hidden" name="id_tarefa" id="editarIdTarefa">
        <!-- <input type="text" name="descricao" id="editarDescricao" class="input-desc-editar"> -->
        <textarea name="descricao" id="editarDescricao" class="input-desc-editar"></textarea>
        <div class="actions-editar">
            <button type="submit" class="btn-salvar-editar"> Salvar </button>
            <button type="button" onclick="fecharModal()" class="btn-cancelar-editar">Cancelar</button>
        </div>
    </form>
</div>