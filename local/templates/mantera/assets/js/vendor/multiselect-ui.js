/* 
Разметка для мультиселекта
<div id="multiselect"></div>

Фейковый селект, пока не выбран первый селект
<div class="select-ui select-ui-hide">
    <div class="select-ui__backdrop" data-type="backdrop"></div>
    <div class="select-ui__input" data-type="input">
        <span data-type="value">Выберите элемент</span>
    </div>
    <div class="select-ui__dropdown">
        <ul class="select-ui__list">        
        </ul>
    </div>
</div>

Вызов библиотеки
document.addEventListener("DOMContentLoaded", function(){
    const multi = new MultiselectUI('#multiselect', {
        placeholder: 'Выберите элемент',
        name: 'test',
        // selectedId: '2',
        data: [
            {id: '1', value: 'test', dataProp: '10-12-2021, 20-12-2021'},
            {id: '2', value: 'Как возрастанию цены', dataProp: '10-12-2021, 20-12-2021'},
            {id: '3', value: 'Повозрастанию цены', dataProp: '11-12-2021, 21-12-2021'},
            {id: '4', value: 'По возрастанию цены', dataProp: '12-12-2021, 22-12-2021'},
            {id: '5', value: 'По возрастанию цены', dataProp: '13-12-2021, 23-12-2021'},
            {id: '6', value: 'По возрастанию цены', dataProp: '14-12-2021, 24-12-2021'},
        ],
            onSelect(item){
            console.log('selected Item', item)
        }
    })
})

Удаление мультиселекта, multi - переменная класса
multi.destroy();
*/

const getTemplateMultiselect = (data = [], placeholder, name, selectedIds) => {
    let text = placeholder ?? 'Placeholder по умолч.';
    let selectName = name;

    const items = data.map(item => {
        let checked = '';
        if (Array.isArray(selectedIds) && selectedIds.length > 0 && selectedIds.includes(item.id)) {
            checked = ' checked=checked';
        }
        return `
        <div class="select-option-list__option">
            <div class="checkbox-option">
                <input class="checkbox-option__trigger" name="${selectName}" type="checkbox" value="${item.value}" id=${item.id} data-type="item" data-id=${item.id} data-prop="${item.dataProp}"${checked}>
                <label class="checkbox-option__label" for=${item.id}>${item.value}</label>
            </div>
        </div>
        `
    }); 
   
    return `
        <div class="select-ui__backdrop" data-type="backdrop"></div>
        <div class="select-ui__input" data-type="input">
            <span data-type="value">${text}</span>
        </div>
        <div class="select-ui__dropdown">
            <ul class="select-ui__list">
                ${items.join('')}
            </ul>
        </div>
    `
}

class MultiselectUI {
    constructor(selector, options) {
        this.$el = document.querySelector(selector);
        this.options = options;
        this.selectedId = options.selectedId;
        this.fakeSelect = document.querySelector('.select-ui-hide');        

        this.render();
        this.checkboxMultiSelect = this.$el.querySelectorAll('[data-type="item"]');
        this.items = [];
        this.selectText = [];
        
        this.setup();
    }

    render = () => {
        const {placeholder, data, name, selectedIds} = this.options;
        this.$el.classList.add('select-ui');
        this.$el.innerHTML = getTemplateMultiselect(data, placeholder, name, selectedIds);
        
        this.hideFakeSelect();
    }

    setup = () => {
        this.$value = this.$el.querySelector('[data-type="value"]');
        this.$el.addEventListener('click', this.toggle);
        this.checkboxMultiSelect.forEach(checkbox => {
            checkbox.addEventListener('change', this.onChangeHandler); 
        });

        if (Array.isArray(this.options.selectedIds)) {
            this.options.selectedIds.map(id => {
                this.select(id);
            });
        }
    }

    get isOpen(){
        return this.$el.classList.contains('open');
    }

    get current(){
        return this.options.data.find(item => item.id === this.selectedId);
    }

    onChangeHandler = (event) => {
        const id = event.target.dataset.id;
        this.select(id);
    }

    select = (id) => {
        this.selectedId = id;  
       
        if(this.$el.querySelector(`[data-id="${id}"]:checked`)) {            
            this.$value.textContent = this.addItem(this.current);
            this.$el.querySelector(`[data-id="${id}"]`).classList.add('selected');
            console.log(this.$value);
        } else {
            this.$value.textContent = (this.removeItem(this.current) !== '') ? this.removeItem(this.current) : this.options.placeholder;
            this.$el.querySelector(`[data-id="${id}"]`).classList.remove('selected');
        }
          
        this.options.onSelect ? this.options.onSelect(this.items) : null; 
    }

    addItem = (item) => {
        this.items.push(item);
        
        this.selectText.push(item.value);
        let result = this.selectText.join(', ');
        
        return result;
    }

    removeItem = (item) => {
        const index = this.items.findIndex(arrayItem => arrayItem.id === item.id);

        if(index !== -1) {
            this.items.splice(index, 1);
            this.selectText.splice(index, 1);            
        }  

        let result = this.selectText.join(', ');
        return result;
    }

    sliceText = (text) => {
        var sliced = text.slice(0, 20);
        if (sliced.length < text.length) {
            sliced += '...';
        }
        return sliced;
    }

    toggle = () =>{
        this.isOpen ? this.close() : this.open();
    }

    open = () => {
        this.$el.classList.add('open');
    }
    
    close = () => {
        this.$el.classList.remove('open');
    }    

    destroy = () => {
        this.$el.removeEventListener('click', this.toggle);
        this.checkboxMultiSelect.forEach(checkbox => {
            checkbox.removeEventListener('change', this.onChangeHandler); 
        });
        this.$el.innerHTML = '';
    }

    clear = () => {
        this.$value.textContent = this.options.placeholder;
        this.checkboxMultiSelect.forEach(checkbox => {
            checkbox.checked = false;
            checkbox.classList.remove('selected');
        });
        
        this.items = [];
        this.selectText = [];
    }

    hideFakeSelect = () => {
        if(this.fakeSelect !== null)
        this.fakeSelect.remove();
    }
}