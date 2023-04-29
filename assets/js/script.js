// Verifica se quer apagar usuário.
let botoesExcluir = document.querySelectorAll(".btn-danger");

for (let botao of botoesExcluir) {
    botao.addEventListener("click", evento => {
        if (!confirm("Deseja realmente excluir?")) {
            evento.preventDefault();
        }
    });
}