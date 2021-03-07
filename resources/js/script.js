function deleteData(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            document.getElementById('delete-form-' + id).submit();
        }
    })
}

// Deposit show page
function processDeposit() {
    Swal.fire({
        title: 'Are you sure to process?',
        text: "You won't be able to revert this! ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Process it!'
    }).then((result) => {
        if (result.value) {
            document.getElementById('process').submit();
        }
    })
}

function completeDeposit() {
    Swal.fire({
        title: 'Are you sure to complete ?',
        text: "You won't be able to revert this! ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Complete it!'
    }).then((result) => {
        if (result.value) {
            document.getElementById('complete-deposit').submit();
        }
    })
}

function cancelDeposit() {
    Swal.fire({
        title: 'Are you sure to cancel ?',
        text: "You won't be able to revert this! ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Cancel it!'
    }).then((result) => {
        if (result.value) {
            document.getElementById('cancel-deposit').submit();
        }
    })
}

async function commentDeposit(){
    const { value: text } = await Swal.fire({
        input: 'textarea',
        inputLabel: 'Comment',
        inputPlaceholder: 'Type your Comment here...',
        inputAttributes: {
            'aria-label': 'Type your Comment here'
        },
        showCancelButton: true
    })

    if (text) {
        document.getElementById('comment').value = text;
        document.getElementById('comment-form').submit();
    }
}

// Withdraw Show Page


function processWithdraw() {
    Swal.fire({
        title: 'Are you sure to process the withdraw order?',
        text: "You won't be able to revert this! It will add withdraw Amount to User's Escrow Wallet and deduct from User's main wallet",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Process it!'
    }).then((result) => {
        if (result.value) {
            document.getElementById('process-withdraw').submit();
        }
    })
}


function completeWithdraw() {
    Swal.fire({
        title: 'Are you sure to complete the Withdraw order?',
        text: "You won't be able to revert this! It will deduct funds from Escrow Wallet.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Complete it!'
    }).then((result) => {
        if (result.value) {
            document.getElementById('complete-withdraw').submit();
        }
    })
}


function cancelWithdraw() {
    Swal.fire({
        title: 'Are you sure to cancel the Withdraw order?',
        text: "You won't be able to revert this! It will cancel the withdraw order.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Cancel it!'
    }).then((result) => {
        if (result.value) {
            document.getElementById('cancel-withdraw').submit();
        }
    })
}

function cancelTrade() {
    Swal.fire({
        title: 'Are you sure to cancel the Trade order?',
        text: "You won't be able to revert this! It will cancel the Trade order.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Cancel it!'
    }).then((result) => {
        if (result.value) {
            document.getElementById('cancel-trade').submit();
        }
    })
}

function completeTrade() {
    Swal.fire({
        title: 'Are you sure to complete the Trade order?',
        text: "You won't be able to revert this! It will complete the Trade order.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Complete it!'
    }).then((result) => {
        if (result.value) {
            document.getElementById('complete-trade').submit();
        }
    })
}

function disputeTrade() {
    Swal.fire({
        title: 'Are you sure to dispute the Trade order?',
        text: "You won't be able to revert this! It will goes the admin staff and they will contact with both traders and give a solution.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Dispute it!'
    }).then((result) => {
        if (result.value) {
            document.getElementById('dispute-trade').submit();
        }
    })
}

function paidTrade() {
    Swal.fire({
        title: 'Are you sure to paid the Trade order?',
        text: "You won't be able to revert this! It will goes the admin staff and they will contact with both traders and give a solution.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, mark it as paid!'
    }).then((result) => {
        if (result.value) {
            document.getElementById('paid-trade').submit();
        }
    })
}

async function commentWithdraw(){
    const { value: text } = await Swal.fire({
        input: 'textarea',
        inputLabel: 'Comment',
        inputPlaceholder: 'Type your Comment here...',
        inputAttributes: {
            'aria-label': 'Type your Comment here'
        },
        showCancelButton: true
    })

    if (text) {
        document.getElementById('comment').value = text;
        document.getElementById('comment-form').submit();
    }
}


function resetForm(formId) {
    document.getElementById(formId).reset();
}

$(document).ready(function() {
    // Dropify
    $('.dropify').dropify();

    // Select2
    $('.select').each(function () {
        $(this).select2();
    });
});
