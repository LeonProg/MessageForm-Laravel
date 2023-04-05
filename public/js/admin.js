window.addEventListener("load", init);

function init() {
    const sort = document.querySelector('.sort')
    const perPage = document.querySelector('.per-page')
    let paramSort = '';
    let paramPage = '?perPage=10';

    sort.addEventListener('change', (e) => {
        paramSort = `&sortBy=${e.target.value}`

        render(paramPage + paramSort)

    })

    perPage.addEventListener('change', (e) => {
        paramPage = `?perPage=${e.target.value}`

        render(paramPage + paramSort)
    })

    render();
}

async function getResponse(param = '') {
    try {
        let response = await fetch(`/public/message${param}`);
        let data = await response.json();

        return data;
    } catch (e) {
        console.log(e);
    }
}

// ?perPage=20&sortBy=desc
async function render(param = '') {
    const table = document.querySelector("table");
    const tbody = table.querySelector("tbody");

    tbody.innerHTML = ``;

    let data = await getResponse(param);
    let dataMessage = data.data;

    console.log(dataMessage)

    dataMessage.forEach((element) => {
        let tr = `
        <tr>
            <th scope="row">${element.user.id}</th>
            <td>${convertTime(element.user.created_at)}</td>
            <td>${convertTime(element.created_at)}</td>
            <td>${element.user.name}</td>
            <td>${element.user.email}</td>
            <td>${element.theme}</td>
            <td>${element.text}</td>
            <td><a href="${element.file_path} download">Ссылка на файл</a></td>
        </tr>
        `;

        tbody.innerHTML += tr;
    });
}
function convertTime(time) {
    const date =  new Date(time)
    return date.toLocaleString()
}



