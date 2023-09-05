let $form = document.querySelector('#contactForm')

$form.addEventListener('submit', handleSubmit ) 

async function handleSubmit (event) {
    event.preventDefault()
    const form = new FormData(this)
    const response = await fetch(this.action, {
        method: this.method,
        body: form,
        headers: {
            'Accept': 'application/json'
        }
    })
    if (response.ok) {
        this.reset()
        Swal.fire({
            icon: 'success',
            title: 'Gracias por Contactarnos!',
            text: 'Nos comunicaremos con usted en la brevedad!',
        })
    }
}

