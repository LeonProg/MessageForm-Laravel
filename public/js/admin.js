window.addEventListener("DOMContentLoaded", init);
const sort = document.querySelector(".sort");
const perPage = document.querySelector(".per-page");

function init() {
    let paramSort = "";
    let paramPage = "?perPage=10";

    sort.addEventListener("change", (e) => {
        paramSort = `&sortBy=${e.target.value}`;
        render(paramPage + paramSort);
    });

    perPage.addEventListener("change", (e) => {
        paramPage = `?perPage=${e.target.value}`;
        render(paramPage + paramSort);
    });

    render();
}

async function getResponse(param = "") {
    try {
        let response = await fetch(`/public/message${param}`);
        let data = await response.json();

        return data;
    } catch (e) {
        console.log(e);
    }
}

const render = async (param = "") => {
    const table = document.querySelector("table");
    const tbody = table.querySelector("tbody");

    let data = await getResponse(param);
    let dataMessage = data.data;

    tbody.innerHTML = ``;

    console.log(dataMessage)

    dataMessage.forEach((element) => {
        let tr = `<tr>
             <th scope="row">${element.user.id}</th>
             <td>${convertTime(element.user.created_at)}</td>
             <td>${convertTime(element.created_at)}</td>
             <td>${element.user.name}</td>
             <td>${element.user.email}</td>
             <td>${element.theme}</td>
             <td>${element.text}</td>
             <td><a href="${element.file_url}" download>Ссылка на файл</a></td>
         </tr>
        `;

        tbody.insertAdjacentHTML("beforeend", tr);
    });

    createPaginate(data);
};

const createPaginate = (data) => {
    const paginateHtml = document.querySelector(".pagination");
    let lastPage = data.lastPage;
    let currentPage = data.currentPage;

    paginateHtml.innerHTML = '';

    let paginate = `
           <li class="page-item ${ currentPage == 1 && 'disabled' }">
               <button class="page-link paginate-btn" value="prev"">Назад</button>
           </li>
           <li class="page-item ${ currentPage == lastPage && 'disabled' }">
               <button class="page-link paginate-btn" value="next"">Дальше</button>
           </li>
       `;

    paginateHtml.insertAdjacentHTML('afterbegin', paginate)

    const paginateBtn = document.querySelectorAll('.paginate-btn');
    paginateBtn.forEach((item) => {
        item.addEventListener('click', (e) => {
            e.preventDefault()
            value = e.target.value
            param = ''
            paramSort = `&sortBy=${sort.value}`;
            paramPage = `perPage=${perPage.value}`;


            if (value === 'next') {

                if (currentPage === lastPage) {
                    param = `?page=${currentPage}&`
                } else {
                    param = `?page=${currentPage  + 1}&`
                }
            }
            if (value === 'prev') {
                if (currentPage === 1) {
                    param = `?page=${currentPage}&`
                } else {
                    param = `?page=${currentPage - 1}&`
                }
            }
            render(param + paramPage + paramSort);
        })
    })
}

function convertTime(time) {
    const date = new Date(time);
    return date.toLocaleString();
}
