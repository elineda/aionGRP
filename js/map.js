$(function(){

function cache(){
  $('#Sanctum').hide();
  $('#Poeta').hide();
  $('#Oriel').hide();
  $('#Iluma').hide();
  $('#Verteron').hide();
  $('#Eltnen').hide();
  $('#Heiron').hide();
  $('#Theobomos').hide();

  $('#Brusthonin').hide();
  $('#Morheim').hide();
  $('#Beluslan').hide();
  $('#Pandaemonium').hide();
  $('#Pernon').hide();
  $('#Altgard').hide();
  $('#Ishalgen').hide();
  $('#Norsvold').hide();

  $('#Inggison').hide();
  $('#SilenteraCanyon').hide();
  $('#Gelkmaros').hide();
  $('#Kaldor').hide();
  $('#Signia').hide();
  $('#Vengar').hide();
  $('#Lakrum').hide();



}





$('#elyseab').click(function() {
  $('#asmodee').hide();
  $('#balaurea').hide();
  $('#elysea').show();
});

$('#asmodeeb').click(function() {
  $('#asmodee').show();
  $('#balaurea').hide();
  $('#elysea').hide();
});

$('#balaureab').click(function() {
  $('#asmodee').hide();
  $('#balaurea').show();
  $('#elysea').hide();
});

function popup(region,tab){
  $('.popup').hide();
  let id= '#'+region;
  let div="<div class=popup><ul>";
  for (var i = 0; i < tab.length; i++) {
    console.log(tab);
    if (tab[i].world_id==region) {
      div+='<li>'+tab[i].name+'</li>';
    }
  }
  div+='</ul></div>';
  $(id).append(div);
}

function map(){
  let url='https://elineda.ovh/aionGRP/api.php?w=test&v=takeonline';
  var tab=[];
  $.getJSON(url, function (data) {

    tab=data;
    for (var i = 0; i < tab.length; i++) {

      //map elysea

      if (tab[i].world_id=="Sanctum") {
        $('#Sanctum').show();
      }
      if (tab[i].world_id=="Poeta") {
        $('#Poeta').show();
      }
      if (tab[i].world_id=="Oriel") {
        $('#Oriel').show();
      }
      if (tab[i].world_id=="Iluma") {
        $('#Iluma').show();
      }
      if (tab[i].world_id=="Verteron") {
        $('#Verteron').show();
      }
      if (tab[i].world_id=="Eltnen") {
        $('#Eltnen').show();
      }
      if (tab[i].world_id=="Heiron") {
        $('#Heiron').show();
      }
      if (tab[i].world_id=="Theobomos") {
        $('#Theobomos').show();
      }

// map asmodee

      if (tab[i].world_id=="Brusthonin") {
        $('#Brusthonin').show();
      }
      if (tab[i].world_id=="Morheim") {
        $('#Morheim').show();
      }
      if (tab[i].world_id=="Beluslan") {
        $('#Beluslan').show();
      }
      if (tab[i].world_id=="Pandaemonium") {
        $('#Pandaemonium').show();
      }
      if (tab[i].world_id=="Pernon") {
        $('#Pernon').show();
      }
      if (tab[i].world_id=="Altgard") {
        $('#Altgard').show();
      }
      if (tab[i].world_id=="Ishalgen") {
        $('#Ishalgen').show();
      }
      if (tab[i].world_id=="Norsvold") {
        $('#Norsvold').show();
      }

      //map balaurea

      if (tab[i].world_id=="Inggison") {
        $('#Inggison').show();
      }
      if (tab[i].world_id=="SilenteraCanyon") {
        $('#SilenteraCanyon').show();
      }
      if (tab[i].world_id=="Gelkmaros") {
        $('#Gelkmaros').show();
      }
      if (tab[i].world_id=="Kaldor") {
        $('#Kaldor').show();
      }
      if (tab[i].world_id=="Signia") {
        $('#Signia').show();
      }
      if (tab[i].world_id=="Vengar") {
        $('#Vengar').show();
      }
      if (tab[i].world_id=="Lakrum") {
        $('#Lakrum').show();
      }
    }
    return tab;
  });
  $('.map').click(function(e){
    popup(e.currentTarget.id,tab);

  });

}

cache();
  $('#asmodee').hide();
  $('#balaurea').hide();

var tab=map();



  window.setInterval(function() {
    cache();
    var tab=map();
  }, 60000);

});
