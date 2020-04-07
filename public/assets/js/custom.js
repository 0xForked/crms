/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

/**
 *  Show File Upload name to File upload label
 *  file upload id must not equal with file upload label + add -label world
 *  e.g on {input=file id="file-upload" } {label id="file-upload-label"}
 */
$(document).ready(function() {
    // to remove url parameter on search value deleted
    $('input[type=search]').on('search', function () {
        if($(this).val().length < 1) {
            window.location = $(location).attr("href").split('/').pop().split('?')[0]
        }
    });

    // to show file name the label
    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        var targetId = '#'+e.target.id + '-label'
        $(targetId).text(fileName);
    });

    // to hide alert after 5 seconds
    $('#alert').delay(5000).fadeOut('slow');

    // to hide loading on first boot
    $('#loading').hide()


    // project type
    var type = $("#type_project")
    projectLinkDisplayed(type.val())

    type.change(function() {
        var selectedType = $(this).children("option:selected").val();
        projectLinkDisplayed(selectedType)
    });

    $(".delete-row-form-store-link").click(function(){
        $("table tbody").find('input[name="record"]').each(function(){
            if($(this).is(":checked")){
                $(this).parents("tr").remove();
                iteration_form_store_link = 2
            }
        });
    });
});

/**
 *  Show Loading Function
 *
 */
function showLoading() {
    $('#loading').show();
}

function deleteProcess() {
    $('#deleteModal').modal('hide');
    showLoading()
}

function updateProcess(modal) {
    var id = '#'+modal
    $(id).modal('hide');
    showLoading()
}

function logoutProcess() {
    $('#logoutModal').hide()
    showLoading()
}

/**
 *  Delete Function
 *
 */
function deleteData(route, token) {
    let container = document.querySelector('#deleteButtonContainer')

    let strAvailable = `
        <a  href="${route}"
            onclick="event.preventDefault();
            document.getElementById('delete-form').submit();
            deleteProcess();"
            class="btn btn-danger"
        >
            Delete
        </a>

        <form
            id="delete-form"
            action="${route}"
            method="POST"
            style="display: none;"
        >
            <input type="hidden" name="_token" value="${token}">
            <input type="hidden" name="_method" value="DELETE">
        </form>
    `

    return container.innerHTML = strAvailable
}

/**
 *  Delete Function
 *
 */
function updateStatus(status, route, token) {
    let container = document.querySelector('#statusButtonContainer')
    var statusText = (status === 'DRAFT') ? 'Publish this Item' : 'Take down this Item'
    var alertColor = (status === 'DRAFT') ? 'success' : 'warning'

    let strAvailable = `
        <a  href="${route}"
            onclick="event.preventDefault();
            document.getElementById('status-form').submit();
            updateProcess('statusModal');"
            class="btn btn-`+alertColor+`"
        >
            `+statusText+`
        </a>

        <form
            id="status-form"
            action="${route}"
            method="POST"
            style="display: none;"
        >
            <input type="hidden" name="_token" value="${token}">
            <input type="hidden" name="_method" value="PUT">
        </form>
    `

    return container.innerHTML = strAvailable
}


function loadData(route, model) {
    $.ajax({
        type: 'GET',
        url: route,
        success: function(data) {
            if (model === 'category') showCategory(data, route)
        },
        error: function(data) { console.log(data) }
    })
}

function showCategory(data, route) {
    $("#formEditCategory").attr('action', route);
    $("#formEditCategory input[name=id]").val(data.id)
    $("#formEditCategory input[name=name]").val(data.name)
    $("#formEditCategory textarea[name=description]").val(data.description)
}


function projectLinkDisplayed(type) {
    if (type === 'WEB') {
        $('#live_link_container').removeClass('d-none')
        $('#store_link_container').addClass('d-none')
    }

    if (type === 'MOBILE') {
        $('#live_link_container').addClass('d-none')
        $('#store_link_container').removeClass('d-none')
    }
}

var iteration_form_store_link = 1;
const item_default_form_store_link = `
            <tr id='storeLink`+iteration_form_store_link+`'>
                <td>
                    <select class="form-control" name="store_name`+iteration_form_store_link+`">
                        <option value="google"> Google Play Store</option>
                        <option value="apple"> Apple App Store </option>
                    </select>
                </td>
                <td>
                    <input
                        name="store_link`+iteration_form_store_link+`"
                        type="text"
                        class="form-control"
                    >
                </td>
                <td class="text-center" style="vertical-align: middle;">
                    <input type="checkbox" name="record" disabled>
                </td>
            </tr>
        `;
$("#table_form_store_link").find('tbody').append(item_default_form_store_link).trigger('change');
iteration_form_store_link = iteration_form_store_link + 1
$("#add_row_form_store_link").click( function() {
    const item_new_form_link = `
                <tr id='storeLink`+iteration_form_store_link+`'>
                    <td>
                        <select class="form-control" name="store_name`+iteration_form_store_link+`">
                            <option value="google"> Google Play Store</option>
                            <option value="apple"> Apple App Store </option>
                        </select>
                    </td>
                    <td>
                        <input
                            name="store_link`+iteration_form_store_link+`"
                            type="text"
                            class="form-control"
                        >
                    </td>
                    <td class="text-center" style="vertical-align: middle;">
                        <input type="checkbox" name="record">
                    </td>
                </tr>
            `;
    if (iteration_form_store_link === 3) {
        alert("Max Form")
    } else {
        $('#table_form_store_link').find('tbody').append(item_new_form_link).trigger('change');
        iteration_form_store_link++;
    }
});



var iteration_form_store_link_update = 2

function deleteFormLinkUpdate(id) {
    $("table tbody").find('button[name="delete"]').each(function() {
        $('#'+id).remove();
        iteration_form_store_link_update = 2
    });
}

function addFormLinkUpdate() {
    const item_new_form_link = `
                <tr id='storeLink`+iteration_form_store_link_update+`'>
                    <td>
                        <select class="form-control" name="store_name`+iteration_form_store_link_update+`">
                            <option value="google"> Google Play Store</option>
                            <option value="apple"> Apple App Store </option>
                        </select>
                    </td>
                    <td>
                        <input
                              name="store_link`+iteration_form_store_link_update+`"
                              type="text"
                              class="form-control"
                         >
                    </td>
                    <td>
                          <button class="btn btn-outline-danger btn-block" type="button" onclick="deleteFormLinkUpdate('storeLink`+iteration_form_store_link_update+`')" name="delete"> Delete </button>
                    </td>
                </tr>
            `;

    if (iteration_form_store_link_update === 3) {
        alert("Max Form")
    } else {
        $('#table_form_store_link_update').find('tbody').append(item_new_form_link).trigger('change');
        iteration_form_store_link_update++
    }
}

$.uploadPreview({
    input_field: "#image-upload",   // Default: .image-upload
    preview_box: "#image-preview",  // Default: .image-preview
    label_field: "#image-label",    // Default: .image-label
    label_default: "Choose File",   // Default: Choose File
    label_selected: "Change File",  // Default: Change File
    no_label: false,                // Default: false
    success_callback: null          // Default: null
});