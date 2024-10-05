// Função para buscar os detalhes do usuário e exibi-los
async
function visualizarUsuario(userId) {
    const token = localStorage.getItem('token'); // Obtém o token do localStorage
    try {
        // Faz a requisição para obter os detalhes do usuário pelo ID
        const response = await fetch(`http: //localhost:8000/api/user/${userId}`, {
        method: 'GET', headers: {
            'Authorization': `Bearer $ {
                token
            }`,
            'Content-Type': 'application/json',
        },
    });

    if (response.ok) {
        const usuario = await response.json();

        // Exibe os detalhes do usuário na página
        const detalhesUsuario = document.getElementById('detalhesUsuario');
        detalhesUsuario.innerHTML = ` < p > <strong > Nome: </strong> ${usuario.name}</p > <p > <strong > Email: </strong> ${usuario.email}</p > <p > <strong > Data de Criação: </strong> ${new Date(usuario.created_at).toLocaleString('pt-BR')}</p > `;
    } else {
        throw new Error('Erro ao buscar os detalhes do usuário');
    }
} catch(error) {
    console.error('Erro:', error);
    const mensagemErro = document.getElementById('mensagemErro');
    mensagemErro.textContent = 'Erro ao carregar os detalhes do usuário';
    mensagemErro.classList.remove('d-none');
}
}

// Obtém o ID do usuário a ser visualizado dos parâmetros da URL
document.addEventListener('DOMContentLoaded',
function() {
    const urlParams = new URLSearchParams(window.location.search);
    const userId = urlParams.get('id'); // ID passado na URL
    if (userId) {
        visualizarUsuario(userId);
    } else {
        const mensagemErro = document.getElementById('mensagemErro');
        mensagemErro.textContent = 'ID de usuário não fornecido.';
        mensagemErro.classList.remove('d-none');
    }
});
