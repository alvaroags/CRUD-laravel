(function(win, doc){
    'use strict';

    function confirmDel(event){
        event.preventDefault();
        let token = doc.getElementsByName("_token")[0].value;
        if(confirm("Deseja mesmo apagar este registro?")){
            let ajax = new XMLHttpRequest();
            ajax.open("DELETE", event.target.parentNode.href);
            ajax.setRequestHeader('X-CSRF-TOKEN', token);
            ajax.onreadystatechange = function(){
                if(ajax.readyState === 4 && ajax.status === 200){
                    win.location.href = "tarefa";
                }
            };
            ajax.send();
        } else {
            return false;
        }
    }
    if(doc.querySelector('.js-del')){
        let btn = doc.querySelectorAll('.js-del');
        for(let i=0; i < btn.length; i++){
            btn[i].addEventListener('click', confirmDel, false);
        }
    }
}) (window, document);

$(document).ready(function() {
    $('.prioridade').click(function(e) {
        e.preventDefault();

        let token = document.getElementsByName("_token")[0].value;
        let prioridade = $(this).data('prioridade'); // Pega o status do item clicado
        let tarefa = $(this).closest('tr').data('tarefa'); // Pega o id da tarefa
        tarefa.prioridade = prioridade;

        $.ajax({
            url: 'tarefa/' + tarefa.id + '/prioridade',
            type: 'PUT',
            data: JSON.stringify({
                ...tarefa,
                _token: token
            }),
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-TOKEN', token);
                xhr.setRequestHeader('Content-Type', 'application/json');
            }
        })
        .done(function() {
            location.reload();
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.error("Error: " + textStatus, errorThrown);
        });
    });
});

$(document).ready(function() {
    $('.status').click(function(e) {
        e.preventDefault();

        let token = document.getElementsByName("_token")[0].value;
        let status = $(this).data('status'); // Pega o status do item clicado
        let tarefa = $(this).closest('tr').data('tarefa'); // Pega o id da tarefa
        tarefa.status = status;

        $.ajax({
            url: 'tarefa/' + tarefa.id + '/status',
            type: 'PUT',
            data: JSON.stringify({
                ...tarefa,
                _token: token
            }),
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-TOKEN', token);
                xhr.setRequestHeader('Content-Type', 'application/json');
            }
        })
        .done(function() {
            location.reload();
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.error("Error: " + textStatus, errorThrown);
        });
    });
});