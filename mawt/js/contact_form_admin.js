;
((d, c, $) => {
  c('Hello Contact Page Admin WordPress')
  c(contact_form)

  d.addEventListener('click', e => {
    if (e.target.matches('.u-delete')) {
      e.preventDefault()
      //c(e.target.dataset.contactId)

      let id = e.target.dataset.contactId,
        confirmDelete = confirm(`¿Estas seguro de eliminar el comentario con el ID ${id}?`)

      if (confirmDelete) {
        $.ajax({
          type: 'post',
          data: {
            'id': id,
            'action': 'mawt_contact_form_delete'
          },
          url: contact_form.ajax_url,
          success: data => {
            c(data)
            let res = JSON.parse(data)
            if (!res.err) {
              let selectorId = '[data-contact-id="' + id + '"]'
              c(selectorId)
              d.querySelector(selectorId).parentElement.parentElement.remove()
            }
          }
        })
      } else {
        return false;
      }
    }
  })
})(document, console.log, jQuery.noConflict());
