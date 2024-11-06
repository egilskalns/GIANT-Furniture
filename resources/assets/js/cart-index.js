document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.counter').forEach(function (counter) {
        const itemId = counter.getAttribute('data-item-id');
        const updateRoute = counter.getAttribute('data-update-route');
        const removeRoute = counter.getAttribute('data-remove-route');
        const csrfToken = counter.getAttribute('data-csrf-token');

        counter.addEventListener('click', function (event) {
            if (event.target.closest('.action-btn')) {
                const action = event.target.closest('.action-btn').getAttribute('data-action');
                let currentQuantity = parseInt(counter.getAttribute('data-current-quantity'));

                let newQuantity;
                let formAction;
                let method;

                if (action === 'increase') {
                    newQuantity = currentQuantity + 1;
                    formAction = updateRoute;
                    method = 'PUT';
                } else if (action === 'decrease' && currentQuantity > 1) {
                    newQuantity = currentQuantity - 1;
                    formAction = updateRoute;
                    method = 'PUT';
                } else if (action === 'remove') {
                    newQuantity = 0;
                    formAction = removeRoute;
                    method = 'DELETE';
                } else {
                    return;
                }

                // Create and submit form dynamically
                const form = document.createElement('form');
                form.action = formAction;
                form.method = 'post';

                // Add CSRF and method fields
                form.innerHTML = `
                        <input type="hidden" name="_token" value="${csrfToken}">
                        <input type="hidden" name="_method" value="${method}">
                        <input type="hidden" name="id" value="${itemId}">
                        ${newQuantity > 0 ? `<input type="hidden" name="quantity" value="${newQuantity}">` : ''}
                    `;

                document.body.appendChild(form);
                form.submit();
            }
        });
    });
});