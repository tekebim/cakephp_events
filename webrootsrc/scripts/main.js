window.addEventListener('load', (event) => {

    console.log('webpack main EBIM');
    // Pass single element
    const element = document.querySelector('.js-choice');
    /*
    const choices = new Choices(element);

    // Pass reference
    const choices = new Choices('[data-trigger]');
    const choices = new Choices('.js-choice');

    // Pass jQuery element
    const choices = new Choices($('.js-choice')[0]);
    */

    // Passing options (with default options)
    const choices = new Choices(element, {
        silent: false,
        items: [],
        choices: [],
        renderChoiceLimit: -1,
        maxItemCount: -1,
        addItems: true,
        addItemFilter: null,
        removeItems: true,
        removeItemButton: true,
        editItems: false,
        duplicateItemsAllowed: true,
        delimiter: ',',
        paste: true,
        searchEnabled: true,
        searchChoices: true,
        searchFloor: 1,
        searchResultLimit: 4,
        searchFields: ['label', 'value'],
        position: 'auto',
        resetScrollPosition: true,
        shouldSort: true,
        shouldSortItems: false,
        placeholder: true,
        placeholderValue: null,
        searchPlaceholderValue: null,
        prependValue: null,
        appendValue: null,
        renderSelectedChoices: 'auto',
        loadingText: 'Loading...',
        noResultsText: 'No results found',
        noChoicesText: 'No choices to choose from',
        itemSelectText: 'Press to select',
        addItemText: (value) => {
            return `Press Enter to add <b>"${value}"</b>`;
        },
        maxItemText: (maxItemCount) => {
            return `Only ${maxItemCount} values can be added`;
        },
        valueComparer: (value1, value2) => {
            return value1 === value2;
        },
        classNames: {
            containerOuter: 'choices',
            containerInner: 'choices__inner',
            input: 'choices__input',
            inputCloned: 'choices__input--cloned',
            list: 'choices__list',
            listItems: 'choices__list--multiple',
            listSingle: 'choices__list--single',
            listDropdown: 'choices__list--dropdown',
            item: 'choices__item',
            itemSelectable: 'choices__item--selectable',
            itemDisabled: 'choices__item--disabled',
            itemChoice: 'choices__item--choice',
            placeholder: 'choices__placeholder',
            group: 'choices__group',
            groupHeading: 'choices__heading',
            button: 'choices__button',
            activeState: 'is-active',
            focusState: 'is-focused',
            openState: 'is-open',
            disabledState: 'is-disabled',
            highlightedState: 'is-highlighted',
            selectedState: 'is-selected',
            flippedState: 'is-flipped',
            loadingState: 'is-loading',
            noResults: 'has-no-results',
            noChoices: 'has-no-choices'
        },
        // Choices uses the great Fuse library for searching. You
        // can find more options here: https://github.com/krisk/Fuse#options
        fuseOptions: {
            include: 'score'
        },
        callbackOnInit: null,
        callbackOnCreateTemplates: null
    });

    deferVideo();

    function deferVideo() {

        //defer html5 video loading
        $("video source").each(function() {
            var sourceFile = $(this).attr("data-src");
            $(this).attr("src", sourceFile);
            var video = this.parentElement;
            video.load();
            // uncomment if video is not autoplay
            //video.play();
        });

    }
});

/*
window.addEventListener('load', (event) => {

    let i = 0;
    let original = document.getElementsByClassName('duplicater')[0];
    let gpeOriginal = document.getElementById('gpe-user-id-' + i);
    let defaultID = original.getAttribute('data-field');
    let btnDuplicate = document.getElementById('btn-duplicate');

    console.log(defaultID);

    // Original first input
    original.addEventListener('input', function (event) {
        // Test if input empty ( default )
        if (event.target.value !== '') {
            btnDuplicate.disabled = false;
        } else {
            btnDuplicate.disabled = true;
        }

    }, false);

    btnDuplicate.addEventListener('click', function (e) {
        e.preventDefault();

        // Disable item to clone
        if (i === 0) {
            gpeTarget = gpeOriginal;
        } else {
            gpeTarget = document.getElementById('gpe-user-id-' + i);
        }

        let gpeClone = gpeTarget.cloneNode(true);
        let selectClone = gpeClone.querySelectorAll('[id="user-id-' + i + '"]')[0];
        selectClone.id = 'user-id-' + ++i;
        let btnDeleteClone = gpeClone.querySelectorAll('.btn-delete')[0];
        // let previousField = document.getElementById(defaultID+'-'+i);
        let previousField = document.getElementById('user-id-0');

        targetValue = gpeOriginal;

        gpeClone.classList.add("duplicater" + i);
        gpeClone.id = 'gpe-user-id-' + i;

        selectClone.setAttribute("name", defaultID + '[' + i + ']');
        btnDeleteClone.setAttribute("data-field", defaultID + '[' + i + ']');

        gpeOriginal.after(gpeClone);
        previousField.disabled = true;

        i++;

    });

});



*/
