"use strict"

    document.addEventListener('DOMContentLoaded', function () {
        // Attach a click event listener to all "Edit" buttons
        document.querySelectorAll('.edit-order-link').forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();

                // Get the order ID from the data-id attribute
                var orderId = this.getAttribute('data-id');

                // Make an AJAX request to fetch the modal content
                fetch('/orders/' + orderId + '/edit', {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(function (response) {
                    if (!response.ok) {
                        throw new Error('Failed to fetch modal content.');
                    }
                    return response.json();
                })
                .then(function (data) {
                    // Inject the modal content into the container
                    var modalContainer = document.getElementById('ajaxEditModalContainer');
                    modalContainer.innerHTML = data.html;

                    // Show the modal using Bootstrap's modal API
                    var editModal = new bootstrap.Modal(document.getElementById('editOrderModal'));
                    editModal.show();
                })
                .catch(function (error) {
                    console.error('Error fetching modal content:', error);
                });
            });
        });
    });

