import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
$(document).ready(function(){

    $('#cnpj').mask('00.000.000/0000-00');
    $('#telefone').mask('(00) 00000-0000');
    $('#cep').mask('00000-000');
    $('#valor_compra').mask('###.###.###.##0,00', {reverse: true});
    $('#valor').mask('###.###.###.##0,00', {reverse: true}); //Multa
    
    $('.btn_delete').click(function(){
    
        var veiculo_id = $(this).val();
    
        
        $('#popup-modal').show();
        
        $('button#confirm').click(function(){
            $("#veiculo_id").val(veiculo_id);
            
            $('#popup-modal').hide();
            console.log(veiculo_id);
    
        
        });
    });
    
    $('.close_modal').click(function(){
        $('#popup-modal').hide();
    });
    
    if($('input#quitado').val() == 1){
        console.log('quitado');
    
        $("input[type='checkbox']").attr("checked", "checked");
    }

    const cep = document.querySelector('#cep');

    const showData = (result) => {
        for(const campo in result){
            if(document.querySelector('#'+campo)){
                document.querySelector('#'+campo).value = result[campo];
            }
        }
    }

    cep.addEventListener('blur', (e) => {
        let search = cep.value.replace('-', '');
        
        const options = {
            method: 'GET',
            mode: 'cors',
            cache: 'default'
        }

        fetch(`https://viacep.com.br/ws/${search}/json/`, options)
            .then(response => { response.json()
                .then(data => showData(data))
            })
            .catch(e => console.log('Deu Erro: '+ e, message))
    });
    
});