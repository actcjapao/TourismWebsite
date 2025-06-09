// validator function (start)
function notEmpty(caller) {
    if (caller.val() == "") {
        caller.addClass("is-invalid");
        caller.focus();
        return false;
    } else {
        caller.removeClass("is-invalid");
        return true;
    }
}

function scrollNavigate(target) {
    var $target = $(target);

    // Ensure no jump before scrolling
    if ($target.length) {
        // Scroll to the target immediately with no delay
        $('html, body').stop(true, true).animate({
        scrollTop: $target.offset().top
        }, 50, 'swing');  // Set the speed of the scroll (500ms)
    }
}

function showNotyf(message, type = "success") {
    // Create an instance of Notyf
    const notyf = new Notyf({
        duration: 5000,
        position: {
            x: 'right',
            y: 'top',
        }
    });

    // Show the message based on type
    switch (type) {
        case "error":
            notyf.error(message);
            break;
        case "success":
        default:
            notyf.success(message);
            break;
    }
}

function loadingState(el, is_loading, text = "Loading") {
    const formBasedTags = ["input", "button", "select", "textarea"];
    const tag = el.prop("tagName").toLowerCase();

    if(formBasedTags.includes(tag)) {
        if(tag === "button") {
            el.text(text);
            el.prop('disabled', is_loading);
        }

        el.prop('disabled', is_loading);
    } else {
        el.addClass('disabledTag');
    }
}