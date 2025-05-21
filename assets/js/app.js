'use strict';

document.getElementById('applyFilter').addEventListener('click', async () => {
  const params = new URLSearchParams({
    grau: document.getElementById('filterGrau').value,
    sigilo: document.getElementById('filterSigilo').value,
  });

  const response = await fetch(`/filter?${params}`);
  if (!response.ok) {
    console.error('Erro ao buscar mensagens');
    return;
  }

  const messages = await response.json();
  const tbody = document.getElementById('msg-body');
  tbody.innerHTML = messages.map(m => `
    <tr>
      <td>${m.id}</td>
      <td>${m.remetente}</td>
      <td>${m.destinatario}</td>
      <td>${m.mensagem}</td>
      <td>${m.grau}</td>
      <td>${m.sigilo}</td>
      <td>${m.dataEnvio}</td>
    </tr>
  `).join('');
});