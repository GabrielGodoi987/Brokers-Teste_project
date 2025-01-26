import BrokerSerive from "./Brokers.service.js";

const url = "http://0.0.0.0:8080";
const form = document.getElementById("form");
const list = document.getElementById("list");
const registryButton = document.getElementById("registry");
const brokerService = new BrokerSerive(url);

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
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-edit="${item.id}">Editar</button>
            <button class="btn btn-danger" data-delete="${item.id}">Deletar</button>
            </td>
        </tr>
      `;

      // Usando insertAdjacentHTML para adicionar o item à ul
      list.insertAdjacentHTML("beforeend", itemHTML);

      // Encontrando o botão recém-adicionado e adicionando um evento de clique
      const button = list.querySelector(`button[data-edit="${item.id}"]`);
      button.addEventListener("click", () => {
        const modalTitle = document.getElementById("exampleModalLabel");
        const nameInput = document.getElementById("nameInput");
        const cpfInput = document.getElementById("cpfInput");
        const creciInput = document.getElementById("creciInput");
        modalTitle.textContent = `corretor: ${item.name}`;
        nameInput.value = item.name;
        cpfInput.value = item.cpf;
        creciInput.value = item.creci;
      });

      const deleteBtn = list.querySelector(`button[data-delete="${item.id}"]`);
      deleteBtn.addEventListener("click", () => {
        location.reload();
        return brokerService.deleteBroker(item.id);
      });
    });
  } catch (error) {
    console.error("Erro ao buscar os dados:", error);
  }
}

// this function is meant to create a new broker
registryButton.onclick = async (e) => {
  e.preventDefault();
  let content = {
    name: form[0].value,
    cpf: form[1].value,
    creci: form[2].value,
  };
  console.log(content)
  if (
    !content.name.length > 5 &&
    !content.cpf.length >= 11 &&
    !content.creci.length >= 5
  ) {
    const alertDiv = document.createElement("div");
    alertDiv.className =
      "alert bg-danger text-white rounded border-danger position-absolute mt-2 top-0 start-50 translate-middle-x p-3";
    alertDiv.setAttribute("role", "alert");
    alertDiv.textContent = "Os campos precisam ser preenchidos corretamente";
    document.body.appendChild(alertDiv);

    setTimeout(() => {
      alertDiv.classList.add("my-slide-in-top");
    }, 10);

    setTimeout(() => {
      alertDiv.remove();
    }, 1000);
    return;
  }

  location.reload();
  const request = await brokerService.createBroker(content);
  if(request){
    const alertDiv = document.createElement("div");
    alertDiv.className =
      "alert bg-danger text-white rounded border-primary position-absolute mt-2 top-0 start-50 translate-middle-x p-3";
    alertDiv.setAttribute("role", "alert");
    alertDiv.textContent = "Corretor cadastrado com sucesso";
    document.body.appendChild(alertDiv);
  }
};

fetchAndDisplayData();
