(function () {
    emailjs.init("KOiksqYSweM_7bTmg")
})();

document.getElementById('send-btn').addEventListener('click', function(event) {
    event.preventDefault();

    // generate the contact number value
    const contactNumber = Math.random() * 100000 | 0;

    emailjs.sendForm('service_iydll8r', 'YOUR_TEMPLATE_ID', '#contact-form', 'KOiksqYSweM_7bTmg')
        .then(function(response) {
            console.log('SUCCESS!', response.status, response.text);
            alert('Your mail is sent!');
        }, function(error) {
            console.log('FAILED...', error);
            alert('Oops... ' + JSON.stringify(error));
        });
});
