
const showToastr = (type, message) => {
    switch (type) {
        case 'success':
            Toastify({
                text: message,
                className: 'success',
                style: {
                    background: 'linear-gradient(90deg, rgba(6,236,60,1) 31%, rgba(11,235,131,0.8968837535014006) 64%, rgba(53,204,111,1) 100%)',
                },
            }).showToast();
            break;
        case 'warning':
            Toastify({
                text: message,
                className: 'warning',
                style: {
                    background: 'linear-gradient(90deg, rgba(184,191,10,1) 31%, rgba(92,121,9,0.5663515406162465) 64%, rgba(255,149,0,1) 100%)',
                },
            }).showToast();
            break;
        case 'info':
            Toastify({
                text: message,
                className: 'info',
                style: {
                    background: 'linear-gradient(90deg, rgba(86,238,221,1) 31%, rgba(100,208,212,0.5663515406162465) 64%, rgba(17,141,181,1) 100%)',
                    color: 'black'
                },
            }).showToast();
            break;
        case 'error':
            Toastify({
                text: message,
                className: 'error',
                style: {
                    background: 'linear-gradient(90deg, rgba(238,96,86,1) 31%, rgba(212,152,100,0.5663515406162465) 64%, rgba(204,89,101,1) 100%)',
                },
            }).showToast();
            break;
        default:
            Toastify({
                text: message,
                className: 'info',
                style: {
                    background: 'linear-gradient(90deg, rgba(9,233,136,1) 31%, rgba(11,62,39,0.5663515406162465) 64%, rgba(35,255,0,1) 100%)',
                },
            }).showToast();
    }
};

