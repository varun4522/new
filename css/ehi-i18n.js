class EhiI18n {
    languageKey = 'ehiI18n.Language'
    // language = 'zh'
    language = localStorage.getItem('lang') || 'ban'
    languageJSON = {}
    basePath = ''
    typeReg = /(\[.*\])/g
    valReg = /([^(\[.+\])]+$)|(^[^(\[.+\])]+)/g
    callback = null
    constructor(basePath,callback) {
        if(typeof basePath === 'function'){
            this.callback = basePath
        }else{
            this.basePath = basePath
            this.callback = callback
        }

        this.getLanguage()
        this.loadLanguage()
    }



    /**
     * 初始化界面元素
     * @param languageJSON
     */
    init(languageJSON) {
        let domAll = document.querySelectorAll('[i18n]');
        for (let i = 0; i < domAll.length; i++) {
            let dom = domAll[i]
            let i18n = dom.getAttribute('i18n')
            let result = i18n.match(this.typeReg);
            let types = []
            let attr = ''
            if (result != null && result.length > 0) {
                let type = result[0]
                type = type.substr(1, type.length - 2)
                if (type.indexOf(',') !== -1) {
                    let typeArr = type.split(',')
                    for (let j = 0; j < typeArr.length; j++) {
                        if (typeArr[j].indexOf('.') !== -1) {
                            let typeArrAttr = typeArr[j].split('.')
                            types.push({type: typeArrAttr[0], attr: typeArrAttr[1]})
                        } else {
                            types.push(typeArr[j])
                        }
                    }
                } else {
                    if (type.indexOf('.') !== -1) {
                        let typeArr = type.split('.')
                        types.push({type: typeArr[0], attr: typeArr[1]})
                    } else {
                        types.push(type)
                    }
                }
            } else {
                types.push('html')
            }
            let key = i18n.match(this.valReg);
            key = key[0]
            let text = languageJSON[key]
            for (let j = 0; j < types.length; j++) {
                let type = types[j]
                let attr = ''
                if (typeof types[j] === 'object') {
                    type = types[j]['type']
                    attr = types[j]['attr']
                }
                if ('html' === type) {
                    dom.innerHTML = text
                } else if (type === 'value') {
                    dom.value = text
                } else if (type === 'placeholder') {
                    dom.setAttribute('placeholder', text)
                } else if (type === 'attr') {
                    dom.setAttribute(attr, text)
                }
            }
        }
    }

    /**
     * 获取国际化对应的值
     * @param key
     * @returns {*}
     */
    get(key) {
        return this.languageJSON[key]
    }

    /**
     * 加载语言文件
     */
    loadLanguage() {
        //版本号

        const timestamp = new Date().getTime(); // 获取当前时间戳
        const cachedKey = `languageCache_${this.language}`; // 缓存键，仅根据当前语言名称生成
        let url = `${this.basePath}${this.language}.json?ts=${timestamp}`; // 向URL添加时间戳

        // 尝试从localStorage获取缓存数据
        let cachedData = getItemWithExpiry(cachedKey);
        if (cachedData) {
            console.log("========进入缓存======")
            try {
                this.languageJSON = JSON.parse(cachedData);
                this.init(this.languageJSON);
                if (this.callback) {
                    this.callback();
                }
                setItemWithExpiry(cachedKey, request.responseText, 10 * 60 * 1000); // 10分钟 = 10 * 60 * 1000 毫秒
                return; // 缓存命中，直接返回
            } catch (error) {
                // 如果缓存数据损坏，则删除缓存并重新加载
                localStorage.removeItem(cachedKey);
            }
        }
        let request = new XMLHttpRequest();
        request.open("get", url, true);
        request.send(null);
        request.onload = () => {
            if (request.status === 200) {
                this.languageJSON = JSON.parse(request.responseText);
                // console.log("========语言json 设置缓存 ======")
                setItemWithExpiry(cachedKey, request.responseText, 10 * 60 * 1000); // 10分钟 = 10 * 60 * 1000 毫秒
                this.init(this.languageJSON);
                if (this.callback) {
                    this.callback();
                }
            } else {
                console.error(`语言设置读取失败: ${request.statusText}`);
            }
        };

        request.onerror = () => {
            console.error('加载语言文件时发生网络错误');
        };
    }

    /**
     * 获取当前设置的语言
     */
    getLanguage() {
        let languageTemp = localStorage.getItem(`${this.languageKey}`)
        if (languageTemp != null && languageTemp.length > 0) {
            this.language = languageTemp
        }
        return this.language
    }

    /**
     * 设置当前语言
     * @param language
     */
    setLanguage(language) {
        this.language = language
        localStorage.setItem(`${this.languageKey}`, language)
        this.loadLanguage()
    }
}
