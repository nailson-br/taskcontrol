<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
  <script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.min.js" charset="utf-8"></script>
  <script type="text/javascript" src="/js/bootstrap.min.js" charset="utf-8"></script>

  <script type="text/javascript">
      data = "";
      mandar = function() {
          $.ajax({
              url: 'tarefas',
              type: 'POST',
              data:{task_cod:$('#task_cod').val(),
                  task_type:$('#task_type').val(),
                  start_date:$('#start_date').val(),
                  end_date:$('#end_date').val(),
                  deploy_date:$('#deploy_date').val(),
                  back:$('#back').val(),
                  front:$('#front').val(),
                  qa:$('#qa').val()
              },
              success: function(response) {
                  alert(response.message);
                  load();
              }
          });
      }

      load = function() {
          $.ajax({
              url: 'list_tasks',
              type: 'POST',
              success: function(response) {
                  data: response.data;
                  $('.tr').remove();
                  for (i = 0; i < response.data.length; i++) {
                      $("#table").append("<tr><td>" + response.data[i].task_cod + "</td>" +
                          "<td>" + responde.data[i].task_type +"</td>" +
                          "<td>" + responde.data[i].start_date +"</td>" +
                          "<td>" + responde.data[i].end_date +"</td>" +
                          "<td>" + responde.data[i].deploy_date +"</td>" +
                          "</tr>");
                  }
              }
          });
      }
  </script>

</head>
