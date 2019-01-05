var InfoCita = {
  idAgenda: "",
  idPaciente: "",
  idOrtopedista: "",
  fechaCita: "",
  horaInicio: "",
  horaFin: ""
};

$("#AbrirModalEliminar").click(function(){
  $.get("/cenop/agenda/ConsultarCitasEliminar",
  function(citas){

    $("#ModalEliminarCitas").modal("show");
    $("#idCitas").empty();
    var Datos = "";
    $.each(citas, function(index, value){
      Datos += "<option value='" + value.idAgenda + "'>" + value.nombrePaciente + " - " + value.fechaCita + " - " + value.horaInicio + " - " + value.horaFin + "</option>";
    });
    $("#idCitas").append(Datos);
  });
});

$("#EliminarCita").click(function(){
  var idCita = $("#idCitas").val();
  $.get("/cenop/agenda/EliminarCita",{"idAgenda": idCita},
  function(resp){
    if (resp == "OK") {
      location.reload();
    }
  });
});

$(".calendario").datetimepicker({
  locale: 'es',
  format: 'YYYY/MM/DD'
});

setTimeout(function(){
  $("#txtHoraInicio").datetimepicker({
    locale: 'es',
    format: 'LT'
  }).on('dp.change', function(e){
    var formatedValue = e.date.format(e.date._f);
    var hora = "";
    var nuevahora = "";
    if (formatedValue.length == 25) {
      hora = formatedValue.split('T')[1].substring(0,5);
    }else {
      hora = formatedValue;
    }
    //nuevahora = moment().add(1,'hours').format("HH:mm");

  });

  $("#txtHoraFin").datetimepicker({
    format: 'LT'
  });
},1000);



$(document).ready(function(){


  var Events = [];
  // var Citas = [
  //   {"Nombre": "Cita revisión", "FechaActividad": "2018-02-01", "HoraInicio": "08:00", "HoraFin":"10:00", "ortopedista": "Carlos Peláez", "Paciente": "Santiago Valencia", "color": "green"},
  //   {"Nombre": "Toma medidas", "FechaActividad": "2018-02-06", "HoraInicio": "08:30", "HoraFin":"11:00", "ortopedista": "Santiago", "Paciente": "Zoraida", "color": "red"},
  //   {"Nombre": "Prubas Ortesis", "FechaActividad": "2018-02-25", "HoraInicio": "12:00", "HoraFin":"14:00", "ortopedista": "Carlos Peláez", "Paciente": "Zoraida", "color": "blue"},
  //   {"Nombre": "Prueba 2", "FechaActividad": "2018-02-25", "HoraInicio": "14:00", "HoraFin":"15:00", "ortopedista": "Carlos Peláez", "Paciente": "Ignacio", "color": "blue"},
  // ];

  $.get("/cenop/agenda/ConsultarTodasCitas",
  function(Agenda){

    $.each(Agenda, function(index, value){
      var Inicio = value.fechaCita.split('-');
      var Fin = value.fechaCita.split('-');
      var HoraInicio = value.horaInicio.split(':');
      var HoraFin = value.horaFin.split(':');
      var color =  "green";

      Events.push({
        title: value.nombreOrtopedista,
        start: new Date(parseInt(Inicio[0]), parseInt(Inicio[1]) - 1, parseInt(Inicio[2].substring(0, 2)), parseInt(HoraInicio[0]), parseInt(HoraInicio[1])),
        end: new Date(parseInt(Fin[0]), parseInt(Fin[1]) - 1, parseInt(Fin[2].substring(0, 2)), parseInt(HoraFin[0]), parseInt(HoraFin[1])),
        allDay: false,
        color: color,
        tip: "OP: " + value.op + " - " + value.nombrePaciente + " - Motivo: "+ value.motivo
      })

    });

    $('#calendar').fullCalendar({

      header: {
        left: 'title',
        center: 'agendaDay,agendaWeek,month',
        right: 'prev,next today'

      },
      height: window.innerHeight - 100,
      windowResize: function () {
        $('#calendar').fullCalendar('option', 'height', window.innerHeight - 100);
      },
      theme: false,
      ignoreTimezone: false,
      events: Events,
      eventRender: function (event, element) {
        element.attr('title', event.tip);
      },
      editable: false,
      firstDay: 1,
      selectable: false,
      defaultView: 'month',
      axisFormat: 'H:mm',
      columnFormat: {
        month: 'ddd',
        week: 'ddd d',
        day: 'dddd M/d',
        agendaDay: 'dddd d'
      },
      titleFormat: {
        month: 'MMMM yyyy',
        week: "MMMM yyyy",
        day: 'MMMM yyyy'
      },
      allDaySlot: false,
      selectHelper: true,
      select: function (start, end, allDay) {
        var title = prompt('Event Title:');
        if (title) {
          calendar.fullCalendar('renderEvent',
          {
            title: title,
            start: start,
            end: end,
            allDay: allDay
          },
          true
        );
      }
      calendar.fullCalendar('unselect');
    },
    droppable: true,
    drop: function (date, allDay) {


      var originalEventObject = $(this).data('eventObject');


      var copiedEventObject = $.extend({}, originalEventObject);


      copiedEventObject.start = date;
      copiedEventObject.allDay = allDay;



      $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);


      if ($('#drop-remove').is(':checked')) {

        $(this).remove();
      }

    },

  });
});
});

$("#AbrirModalCitas").click(function(){
  $("#ModalCitas").modal("show");
  $("#DatosPaciente").hide();
});

$("#BuscarTecnicos").click(function(){
  var fechaCita = $("#txtFechaCita").val();
  var horaInicio = $("#txtHoraInicio").val();
  var horaFin = $("#txtHoraFin").val();

  $.get("/cenop/agenda/ConsultarDisponibilidadTecnico", {"fechaCita": fechaCita, "horaInicio": horaInicio, "horaFin": horaFin},
  function(ortopedista){
    $("#idOrtopedista").empty();
    var Datos = "";
    $.each(ortopedista, function(index, value){
      Datos += "<option value='" + value.idOrtopedista + "'>" + value.nombre + " " + value.apellido + "</option>";
    });

    $("#idOrtopedista").append(Datos);
  });
});

$("#BuscarPaciente").click(function(){
  var DocumentoPaciente = $("#txtDocumentoPaciente").val();
  $.get("/cenop/ordenproduccion/BuscarPaciente", {"numeroDocumento": DocumentoPaciente},
  function(Paciente){

    if (Paciente != null) {
      $("#DatosPaciente").show(300);
      $("#txtNombre").val(Paciente.nombre + " "+ Paciente.apellido);
      $("#txtTelefono").val(Paciente.telefono);
      //InfoCita.idPaciente = Paciente.idPaciente;
      $("#idPaciente").val(Paciente.idPaciente);
    }else {
      $("#DatosPaciente").hide();
      $("#txtNombre").val("");
      $("#txtTelefono").val("");
      bootbox.dialog({
        title: "Información",
        message: "Este documento de identidad no se encuentra registrado",
        buttons: {
          success: {
            label: "Cerrar",
            className: "btn-primary",
          }
        }
      });
    }
  });
});


// $("#GuardarCita").click(function(){
//   InfoCita.idOrtopedista = $("#idOrtopedista").val();
//   InfoCita.fechaCita $("#txtFechaCita");
//   InfoCita.horaInicio = $("#txtHoraInicio");
//   InfoCita.horaFin = $("#txtHoraFin");
//
// });
