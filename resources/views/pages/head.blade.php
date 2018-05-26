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
      mandar = function() {
        let token = document.querySelector('meta[name="csrf-token"]');

          $.ajax({
              url: '/tarefas',
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
                  // console.log(response);
                  //alert(response.message);
                  addLine(response);
              }
          });
      }

      addLine = function (response) {
        $("#table tbody").append("<tr><td>" + response.task_cod + "</td>" +
                          "<td>" + response.task_type +"</td>" +
                          "<td>" + response.start_date +"</td>" +
                          "<td>" + response.end_date +"</td>" +
                          "<td>" + response.deploy_date +"</td>" +
                          "</tr>");
      }

      load = function() {
          $.ajax({
              url: '/list_tasks',
              type: 'GET',
              success: function(response) {
                console.log(response)
                  // $('.tr').remove();
                  for (i = 0; i < response.length; i++) {
                    console.log(response[i])
                    addLine(response[i]);
                  }
              }
          });
      }
  </script>

</head>
