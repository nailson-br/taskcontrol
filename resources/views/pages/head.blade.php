<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
  <script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.min.js" charset="utf-8"></script>
  <script type="text/javascript" src="/js/bootstrap.min.js" charset="utf-8"></script>

  <script type="text/javascript">

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    
      data = "";
      saveNewTask = function() {
        let token = document.querySelector('meta[name="csrf-token"]');

          $.ajax({
              url: '/tarefas',
              type: 'POST',
              data:{task_cod:$('#task_cod').val(),
                  task_type:$('#task_type').val(),
                  task_description:$('#task_description').val(),
                  start_date:$('#start_date').val(),
                  end_date:$('#end_date').val(),
                  deploy_date:$('#deploy_date').val(),
                  back:$('#back').is(':checked'),
                  front:$('#front').is(':checked'),
                  qa:$('#qa').is(':checked')
              },
              success: function(response) {
                  // console.log(response);
                  console.log('back: ' + $('#back').is(':checked'));
                  //alert(response.message);
                  addNewTaskLine(response);
                  $('#newTaskForm')[0].reset();
              }
          });
      }

      addNewTaskLine = function (response) {
        $("#table tbody").append("<tr><td>" + response.task_cod + "</td>" +
                          "<td>" + response.task_type +"</td>" +
                          "<td>" + response.start_date +"</td>" +
                          "<td>" + response.end_date +"</td>" +
                          "<td>" + response.deploy_date +"</td>" +
                          "<td><a href=\"/detalhes_da_tarefa/" + response.id +"\"><span class=\"glyphicon glyphicon-edit\"></span></a></td>" +
                          "</tr>");
      }

      loadTasks = function() {
          $.ajax({
              url: '/lista_tarefas',
              type: 'GET',
              success: function(response) {
                // console.log(response)
                  // $('.tr').remove();
                  for (i = 0; i < response.length; i++) {
                    // console.log(response[i])
                    addNewTaskLine(response[i]);
                  }
              }
          });
      }

      saveNewSubTask = function() {
        let token = document.querySelector('meta[name="csrf-token"]');

          $.ajax({
              url: '/sub_tarefa',
              type: 'POST',
              data:{task_cod:$('#task_cod').val(),
                  subtask_cod:$('#subtask_cod').val(),
                  subtask_type:$('#subtask_type').val(),
                  subtask_description:$('#subtask_description').val(),
                  back:$('#subtask_back').is(':checked'),
                  front:$('#subtask_front').is(':checked'),
                  qa:$('#subtask_qa').is(':checked')
              },
              success: function(response) {
                  // console.log(response);
                  // alert(response.message);
                  addNewSubTaskLine(response);
                  $('#x').click();
                  $('#newSubTaskForm')[0].reset();
              }
          });
      }

      addNewSubTaskLine = function (response) {
        $("#subtask_table tbody").append("<tr><td>" + response.cod + "</td>" +
                          "<td>" + response.description +"</td>" +
                          "<td>" + response.type +"</td>" +
                          "<td>" + response.subtask_status +"</td>" +
                          "<td><a href=\"/detalhes_da_tarefa/" + response.id +"\"><span class=\"glyphicon glyphicon-edit\"></span></a></td>" +
                          "</tr>");
      }

      loadSubTasks = function() {
          $.ajax({
              url: '/lista_sub_tarefas/' + $('#task_cod').val(),
              type: 'GET',
              success: function(response) {
                console.log($('#task_cod').val())
                  // $('.tr').remove();
                  for (i = 0; i < response.length; i++) {
                    // console.log(response[i])
                    addNewSubTaskLine(response[i]);
                  }
              }
          });
      }
  </script>

</head>
