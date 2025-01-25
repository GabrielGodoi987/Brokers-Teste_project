import BrokerSerive from "./Brokers.service.js";

const list = document.getElementById("list");
const url = "http://0.0.0.0:8080";
export const brokerService = new BrokerSerive(url);

async function fetchAndDisplayData() {
  try {
    const data = await brokerService.fetchData();
    list.innerHTML = "";
    data.forEach((item) => {
      const itemHTML = `
        <tr>
            <td>
               ${item.name}
            </td>
            
            <td>
               ${item.cpf}
            </td>
               
            <td>
               ${item.creci}
            </td>
            
            <td>
            <button class="btn btn-primary" data-edit="${item.id}">Editar</button>
            <button class="btn btn-danger" data-delete="${item.id}">Deletar</button>
            </td>
        </tr>
      `;

      // Usando insertAdjacentHTML para adicionar o item à ul
      list.insertAdjacentHTML("beforeend", itemHTML);

      // Encontrando o botão recém-adicionado e adicionando um evento de clique
      const button = list.querySelector(`button[data-edit="${item.name}"]`);
      button.addEventListener("click", () => {
        alert(`Você clicou no botão do item: ${item.creci}`);
      });
    });
  } catch (error) {
    console.error("Erro ao buscar os dados:", error);
  }
}

fetchAndDisplayData();
