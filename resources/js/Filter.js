import {SkeletonTemplate} from "@/Templates/Skeleton.template.js";
import {DeveloperTemplate} from "@/Templates/Developer.template.js";
import {NotFoundTemplate} from "@/Templates/NotFound.template.js";

const form = document.querySelector('form'),
    selects = document.querySelectorAll('select'),
    filter_action = document.getElementById('filter_action'),
    filter_content = document.getElementById('filter_content'),
    filter_type = document.querySelector('input[name="filter_type"]').value,
    filter_params = {
        'developer_id': false,
        'site_id': false,
        'framework_id' : false
    };
let result_response;



const clearSelectParams =  (elem) => {
    const selected = elem.querySelectorAll('option:checked');
    return Array.from(selected).map(el => el.value).toString(',');
}

const setSkeleton = () => {
    let result_template = '';
    filter_content.innerHTML = '';
    for(let i = 0; i < 12; i++) {
        result_template += SkeletonTemplate;
    }
    filter_content.innerHTML = result_template;
}

const parserResultFilter = (result) => {
    filter_content.innerHTML = '';
    if(result.length) {
        result.map((item) => {
            console.log(filter_type);
            if(filter_type === 'developer') {
                filter_content.insertAdjacentHTML('afterbegin', DeveloperTemplate(item))
            }
            else if(filter_type === 'site') {
                filter_content.insertAdjacentHTML('afterbegin', DeveloperTemplate(item))
            }
            else {
                filter_content.innerHTML - `<div class="text-red-900">Что-то пошло не так! Обновите страницу</div>`
            }
            })
    }
    else {
        filter_content.innerHTML = NotFoundTemplate;
    }
}

if (form) {

    document.addEventListener('DOMContentLoaded', () => {
        form.dispatchEvent(new SubmitEvent("submit", {submitter: filter_action, cancelable: true}));
    })

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        setSkeleton()
        selects.forEach((select) => {filter_params[select.name] = clearSelectParams(select)});

        const data = new URLSearchParams();
        for (let elem of Object.entries(filter_params)) {
            if (elem[1]) {
                data.append(elem[0], elem[1]);
            }
        }

        axios.post(form.action, String(data))
            .then((response) => {
                parserResultFilter(response.data.data)
                window.history.pushState(null, null, document.location.pathname + '?' + String(data));
            })
            .catch((error) => {
                alert("Произошла ошибка! Пожалуйста обновите страницу")
                console.warn(error);
            });

    });
}
