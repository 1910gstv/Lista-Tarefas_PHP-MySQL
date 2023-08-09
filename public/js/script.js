function editar(id, txt_tarefa) {
  let form = document.createElement("form");
  form.action = "/lista/acao?acao=editar";
  form.method = "post";
  form.className = "row";

  //criar um input para entrada do texto
  let inputTarefa = document.createElement("input");
  inputTarefa.type = "text";
  inputTarefa.name = "tarefa";
  inputTarefa.className = " col-9 form-control";
  inputTarefa.value = txt_tarefa;

  //criar um input hidden para guardar o id da tarefa
  let inputId = document.createElement("input");
  inputId.type = "hidden";
  inputId.name = "id";
  inputId.value = id;

  //criar um button para envio do form
  let button = document.createElement("button");
  button.type = "submit";
  button.className = "col-2 btn btn-info";
  button.innerHTML = "Atualizar";

  //incluir inputTarefa no form
  form.appendChild(inputTarefa);

  //inclur inputId no form
  form.appendChild(inputId);

  //incluir button no form
  form.appendChild(button);

  //teste
  // console.log(form)

  //Selecionar a div tarefa
  let tarefa = document.getElementById("tarefa_" + id);

  //limpar o texto da tarefa para inclusão do form
  tarefa.innerHTML = "";

  //incluir form na página
  tarefa.insertBefore(form, tarefa[0]);
}

function marcarRealizada(selectedTask, id) {
  location.href = '/lista/acao?acao=marcarRealizada&id=' + id
}

function showMenu(selectedTask) {
  let taskMenu = selectedTask.parentElement.lastElementChild;
  taskMenu.classList.add("show");
  document.addEventListener("click", (e) => {
    //removendo a classe show do menu de tarefas ao clicar no documetno
    if (e.target.tagName != "I" || e.target != selectedTask) {
      taskMenu.classList.remove("show");
    }
  });
}
