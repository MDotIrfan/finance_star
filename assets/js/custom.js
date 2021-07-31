/**
 * @author aughyvikrii
 * @todo menempatkan error ke element messages dalam class form-group input
 * @param {string} form_id 
 * @param {array object} messages 
 */

const show_input_message = (form_id, messages) => {
    const form = $(`#${form_id}`),
        inputs = form.find('input, textarea, select');

    $.each(inputs, (index, input) => {
        input = $(input);
        let name = input.attr('name');

        if(typeof messages[name] == 'undefined') {
            return;
        }

        const form_group = find_form_group(input);
        if(!form_group) return;

        const message = find_message_element(form_group);
        if(!message) return;

        message.html(`<div class="text-alert-danger">${messages[name]}</div>`);
    });
}

const find_form_group = (element) => {
    const input = $(element),
        tagName = input.prop('tagName').toLowerCase();

    if(tagName === 'form') return false;

    if(input.hasClass('form-group')) return input;
    else return find_form_group(input.parent());
}

const find_message_element = (form_group) => {
    const selector = form_group.find('.messages');
    if(selector.length <= 0) return;
    else return $(selector[0]);
}

const remove_input_message = (form_id) => {
    const form = $(`#${form_id}`),
        messages = form.find('.messages');

        messages.html('');
}

jQuery.fn.extend({
    serializeMultipart: () => {
        var element = $(this)[0];
        console.log(`element`, element.serialize())
    }
});

(function($){

    $.fn.serializeMultipart = function() {
        let element = $(this);
        let input = element.find('input, textarea, select');
        
        const formData = new FormData;

        $.each(input, (index, data) => {
            let field = $(data);
            if(field.attr('type')=='file') {
                let file = field[0]?.files[0];
                
                if(file) {
                    formData.append(
                        field.attr('name'),
                        file,
                        field.val()
                    );
                }
            } else {
                formData.set(
                    field.attr('name'),
                    field.val()
                );
            }
        });

        return formData;
      };

})(jQuery)