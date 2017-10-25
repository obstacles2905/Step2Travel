export let events = [
    {
        id : {
          "type": "integer",
          "description": 0,
          "format": "int32"
        },
        city: {
          "type": "array",
          "description": "city, where event is",
          "format": "int32",
          "xml": {
            "name": "Дніпро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/City"
          }
        },
        categories : {
          "type": "array",
          "description": "array of event categories",
          "xml": {
            "name": "Інтелектуальні",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/Category"
          }
        },
        name : {
          "type": "string",
          "description": "Змагання по шахматам",
          "minLength": 5,
          "maxLength": 40
        },
        photoURL : {
          "type": "string",
          "description": "../image/minora.jpg"
        },
        descriptionEvent : {
          "type": "string",
          "description": "Description of current event",
          "maxLength": 900
        },
        date : {
          "type": "string",
          "description": "08/03/2017",
          "month": "Серпня",
          "format": "date"
        },
        begin : {
          "type": "string",
          "description": "12:00",
          "format": "time"
        },
        end : {
          "type": "string",
          "description": "13:00",
          "format": "time"
        },
        latitude : {
          "type": "number",
          "description": "Latitude of event position. Example: 45.1488228",
          "format": "double"
        },
        longtitude : {
          "type": "number",
          "description": "Longtitude of event position. Example: 38.1488228",
          "format": "double"
        }
    },
    {
        id : {
          "type": "integer",
          "description": 1,
          "format": "int32"
        },
        city: {
          "type": "array",
          "description": "city, where event is",
          "format": "int32",
          "xml": {
            "name": "Дніпро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/City"
          }
        },
        categories : {
          "type": "array",
          "description": "array of event categories",
          "xml": {
            "name": "Спорт",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/Category"
          }
        },
        name : {
          "type": "string",
          "description": "Народний жим",
          "minLength": 5,
          "maxLength": 40
        },
        photoURL : {
          "type": "string",
          "description": "../image/minora.jpg"
        },
        descriptionEvent : {
          "type": "string",
          "description": "Description of current event",
          "maxLength": 900
        },
        date : {
          "type": "string",
          "description": "08/03/2017",
          "month": "Серпня",
          "format": "date"
        },
        begin : {
          "type": "string",
          "description": "18:00",
          "format": "time"
        },
        end : {
          "type": "string",
          "description": "20:00",
          "format": "time"
        },
        latitude : {
          "type": "number",
          "description": "Latitude of event position. Example: 45.1488228",
          "format": "double"
        },
        longtitude : {
          "type": "number",
          "description": "Longtitude of event position. Example: 38.1488228",
          "format": "double"
        }
    },
    {
        id : {
          "type": "integer",
          "description": 2,
          "format": "int32"
        },
        city: {
          "type": "array",
          "description": "city, where event is",
          "format": "int32",
          "xml": {
            "name": "Дніпро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/City"
          }
        },
        categories : {
          "type": "array",
          "description": "array of event categories",
          "xml": {
            "name": "Спорт",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/Category"
          }
        },
        name : {
          "type": "string",
          "description": "Crossfit",
          "minLength": 5,
          "maxLength": 40
        },
        photoURL : {
          "type": "string",
          "description": "../image/minora.jpg"
        },
        descriptionEvent : {
          "type": "string",
          "description": "Description of current event",
          "maxLength": 900
        },
        date : {
          "type": "string",
          "description": "08/05/2017",
          "month": "Серпня",
          "format": "date"
        },
        begin : {
          "type": "string",
          "description": "12:00",
          "format": "time"
        },
        end : {
          "type": "string",
          "description": "15:00",
          "format": "time"
        },
        latitude : {
          "type": "number",
          "description": "Latitude of event position. Example: 45.1488228",
          "format": "double"
        },
        longtitude : {
          "type": "number",
          "description": "Longtitude of event position. Example: 38.1488228",
          "format": "double"
        }
    },
    {
        id : {
          "type": "integer",
          "description": 3,
          "format": "int32"
        },
        city: {
          "type": "array",
          "description": "city, where event is",
          "format": "int32",
          "xml": {
            "name": "Дніпро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/City"
          }
        },
        categories : {
          "type": "array",
          "description": "array of event categories",
          "xml": {
            "name": "IT",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/Category"
          }
        },
        name : {
          "type": "string",
          "description": "WEB с 0",
          "minLength": 5,
          "maxLength": 40
        },
        photoURL : {
          "type": "string",
          "description": "../image/minora.jpg"
        },
        descriptionEvent : {
          "type": "string",
          "description": "Description of current event",
          "maxLength": 900
        },
        date : {
          "type": "string",
          "description": "08/04/2017",
          "month": "Серпня",
          "format": "date"
        },
        begin : {
          "type": "string",
          "description": "09:00",
          "format": "time"
        },
        end : {
          "type": "string",
          "description": "13:00",
          "format": "time"
        },
        latitude : {
          "type": "number",
          "description": "Latitude of event position. Example: 45.1488228",
          "format": "double"
        },
        longtitude : {
          "type": "number",
          "description": "Longtitude of event position. Example: 38.1488228",
          "format": "double"
        }
    },
    {
        id : {
          "type": "integer",
          "description": 4,
          "format": "int32"
        },
        city: {
          "type": "array",
          "description": "city, where event is",
          "format": "int32",
          "xml": {
            "name": "Дніпро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/City"
          }
        },
        categories : {
          "type": "array",
          "description": "array of event categories",
          "xml": {
            "name": "Гастро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/Category"
          }
        },
        name : {
          "type": "string",
          "description": "Мастер клас по готуванню шаверми",
          "minLength": 5,
          "maxLength": 40
        },
        photoURL : {
          "type": "string",
          "description": "../image/minora.jpg"
        },
        descriptionEvent : {
          "type": "string",
          "description": "Description of current event",
          "maxLength": 900
        },
        date : {
          "type": "string",
          "description": "08/04/2017",
          "month": "Серпня",
          "format": "date"
        },
        begin : {
          "type": "string",
          "description": "08:00",
          "format": "time"
        },
        end : {
          "type": "string",
          "description": "20:00",
          "format": "time"
        },
        latitude : {
          "type": "number",
          "description": "Latitude of event position. Example: 45.1488228",
          "format": "double"
        },
        longtitude : {
          "type": "number",
          "description": "Longtitude of event position. Example: 38.1488228",
          "format": "double"
        }
    },
    {
        id : {
          "type": "integer",
          "description": 5,
          "format": "int32"
        },
        city: {
          "type": "array",
          "description": "city, where event is",
          "format": "int32",
          "xml": {
            "name": "Дніпро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/City"
          }
        },
        categories : {
          "type": "array",
          "description": "array of event categories",
          "xml": {
            "name": "Історичні",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/Category"
          }
        },
        name : {
          "type": "string",
          "description": "Прогулянка дніпром",
          "minLength": 5,
          "maxLength": 40
        },
        photoURL : {
          "type": "string",
          "description": "../image/minora.jpg"
        },
        descriptionEvent : {
          "type": "string",
          "description": "Description of current event",
          "maxLength": 900
        },
        date : {
          "type": "string",
          "description": "08/03/2017",
          "month": "Серпня",
          "format": "date"
        },
        begin : {
          "type": "string",
          "description": "11:00",
          "format": "time"
        },
        end : {
          "type": "string",
          "description": "15:00",
          "format": "time"
        },
        latitude : {
          "type": "number",
          "description": "Latitude of event position. Example: 45.1488228",
          "format": "double"
        },
        longtitude : {
          "type": "number",
          "description": "Longtitude of event position. Example: 38.1488228",
          "format": "double"
        }
    },
    {
        id : {
          "type": "integer",
          "description": 6,
          "format": "int32"
        },
        city: {
          "type": "array",
          "description": "city, where event is",
          "format": "int32",
          "xml": {
            "name": "Дніпро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/City"
          }
        },
        categories : {
          "type": "array",
          "description": "array of event categories",
          "xml": {
            "name": "Історичні",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/Category"
          }
        },
        name : {
          "type": "string",
          "description": "Відвідання музеїв",
          "minLength": 5,
          "maxLength": 40
        },
        photoURL : {
          "type": "string",
          "description": "../image/minora.jpg"
        },
        descriptionEvent : {
          "type": "string",
          "description": "Description of current event",
          "maxLength": 900
        },
        date : {
          "type": "string",
          "description": "08/10/2017",
          "month": "Серпня",
          "format": "date"
        },
        begin : {
          "type": "string",
          "description": "10:00",
          "format": "time"
        },
        end : {
          "type": "string",
          "description": "18:00",
          "format": "time"
        },
        latitude : {
          "type": "number",
          "description": "Latitude of event position. Example: 45.1488228",
          "format": "double"
        },
        longtitude : {
          "type": "number",
          "description": "Longtitude of event position. Example: 38.1488228",
          "format": "double"
        }
    },
    {
        id : {
          "type": "integer",
          "description": 7,
          "format": "int32"
        },
        city: {
          "type": "array",
          "description": "city, where event is",
          "format": "int32",
          "xml": {
            "name": "Дніпро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/City"
          }
        },
        categories : {
          "type": "array",
          "description": "array of event categories",
          "xml": {
            "name": "Гастро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/Category"
          }
        },
        name : {
          "type": "string",
          "description": "Ярмарка меду",
          "minLength": 5,
          "maxLength": 40
        },
        photoURL : {
          "type": "string",
          "description": "../image/minora.jpg"
        },
        descriptionEvent : {
          "type": "string",
          "description": "Description of current event",
          "maxLength": 900
        },
        date : {
          "type": "string",
          "description": "08/09/2017",
          "month": "Серпня",
          "format": "date"
        },
        begin : {
          "type": "string",
          "description": "06:00",
          "format": "time"
        },
        end : {
          "type": "string",
          "description": "13:00",
          "format": "time"
        },
        latitude : {
          "type": "number",
          "description": "Latitude of event position. Example: 45.1488228",
          "format": "double"
        },
        longtitude : {
          "type": "number",
          "description": "Longtitude of event position. Example: 38.1488228",
          "format": "double"
        }
    },
    {
        id : {
          "type": "integer",
          "description": 8,
          "format": "int32"
        },
        city: {
          "type": "array",
          "description": "city, where event is",
          "format": "int32",
          "xml": {
            "name": "Дніпро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/City"
          }
        },
        categories : {
          "type": "array",
          "description": "array of event categories",
          "xml": {
            "name": "Інтелектуальні",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/Category"
          }
        },
        name : {
          "type": "string",
          "description": "Змагання з математики",
          "minLength": 5,
          "maxLength": 40
        },
        photoURL : {
          "type": "string",
          "description": "../image/minora.jpg"
        },
        descriptionEvent : {
          "type": "string",
          "description": "Description of current event",
          "maxLength": 900
        },
        date : {
          "type": "string",
          "description": "08/03/2017",
          "month": "Серпня",
          "format": "date"
        },
        begin : {
          "type": "string",
          "description": "12:00",
          "format": "time"
        },
        end : {
          "type": "string",
          "description": "15:00",
          "format": "time"
        },
        latitude : {
          "type": "number",
          "description": "Latitude of event position. Example: 45.1488228",
          "format": "double"
        },
        longtitude : {
          "type": "number",
          "description": "Longtitude of event position. Example: 38.1488228",
          "format": "double"
        }
    },
    {
        id : {
          "type": "integer",
          "description": 9,
          "format": "int32"
        },
        city: {
          "type": "array",
          "description": "city, where event is",
          "format": "int32",
          "xml": {
            "name": "Дніпро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/City"
          }
        },
        categories : {
          "type": "array",
          "description": "array of event categories",
          "xml": {
            "name": "Спорт",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/Category"
          }
        },
        name : {
          "type": "string",
          "description": "Марафон з бігу на 30км",
          "minLength": 5,
          "maxLength": 40
        },
        photoURL : {
          "type": "string",
          "description": "../image/minora.jpg"
        },
        descriptionEvent : {
          "type": "string",
          "description": "Description of current event",
          "maxLength": 900
        },
        date : {
          "type": "string",
          "description": "08/09/2017",
          "month": "Серпня",
          "format": "date"
        },
        begin : {
          "type": "string",
          "description": "08:00",
          "format": "time"
        },
        end : {
          "type": "string",
          "description": "12:00",
          "format": "time"
        },
        latitude : {
          "type": "number",
          "description": "Latitude of event position. Example: 45.1488228",
          "format": "double"
        },
        longtitude : {
          "type": "number",
          "description": "Longtitude of event position. Example: 38.1488228",
          "format": "double"
        }
    },
      {
        id : {
          "type": "integer",
          "description": 10,
          "format": "int32"
        },
        city: {
          "type": "array",
          "description": "city, where event is",
          "format": "int32",
          "xml": {
            "name": "Дніпро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/City"
          }
        },
        categories : {
          "type": "array",
          "description": "array of event categories",
          "xml": {
            "name": "Інтелектуальні",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/Category"
          }
        },
        name : {
          "type": "string",
          "description": "Змагання по шахматам",
          "minLength": 5,
          "maxLength": 40
        },
        photoURL : {
          "type": "string",
          "description": "../image/minora.jpg"
        },
        descriptionEvent : {
          "type": "string",
          "description": "Description of current event",
          "maxLength": 900
        },
        date : {
          "type": "string",
          "description": "07/26/2017",
          "month": "Липня",
          "format": "date"
        },
        begin : {
          "type": "string",
          "description": "12:00",
          "format": "time"
        },
        end : {
          "type": "string",
          "description": "13:00",
          "format": "time"
        },
        latitude : {
          "type": "number",
          "description": "Latitude of event position. Example: 45.1488228",
          "format": "double"
        },
        longtitude : {
          "type": "number",
          "description": "Longtitude of event position. Example: 38.1488228",
          "format": "double"
        }
    },
    {
        id : {
          "type": "integer",
          "description": 11,
          "format": "int32"
        },
        city: {
          "type": "array",
          "description": "city, where event is",
          "format": "int32",
          "xml": {
            "name": "Дніпро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/City"
          }
        },
        categories : {
          "type": "array",
          "description": "array of event categories",
          "xml": {
            "name": "Спорт",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/Category"
          }
        },
        name : {
          "type": "string",
          "description": "Народний жим",
          "minLength": 5,
          "maxLength": 40
        },
        photoURL : {
          "type": "string",
          "description": "../image/minora.jpg"
        },
        descriptionEvent : {
          "type": "string",
          "description": "Description of current event",
          "maxLength": 900
        },
        date : {
          "type": "string",
          "description": "06/13/2017",
          "month": "Червня",
          "format": "date"
        },
        begin : {
          "type": "string",
          "description": "18:00",
          "format": "time"
        },
        end : {
          "type": "string",
          "description": "20:00",
          "format": "time"
        },
        latitude : {
          "type": "number",
          "description": "Latitude of event position. Example: 45.1488228",
          "format": "double"
        },
        longtitude : {
          "type": "number",
          "description": "Longtitude of event position. Example: 38.1488228",
          "format": "double"
        }
    },
    {
        id : {
          "type": "integer",
          "description": 12,
          "format": "int32"
        },
        city: {
          "type": "array",
          "description": "city, where event is",
          "format": "int32",
          "xml": {
            "name": "Дніпро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/City"
          }
        },
        categories : {
          "type": "array",
          "description": "array of event categories",
          "xml": {
            "name": "Спорт",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/Category"
          }
        },
        name : {
          "type": "string",
          "description": "Crossfit",
          "minLength": 5,
          "maxLength": 40
        },
        photoURL : {
          "type": "string",
          "description": "../image/minora.jpg"
        },
        descriptionEvent : {
          "type": "string",
          "description": "Description of current event",
          "maxLength": 900
        },
        date : {
          "type": "string",
          "description": "07/27/2017",
          "month": "Липня",
          "format": "date"
        },
        begin : {
          "type": "string",
          "description": "12:00",
          "format": "time"
        },
        end : {
          "type": "string",
          "description": "15:00",
          "format": "time"
        },
        latitude : {
          "type": "number",
          "description": "Latitude of event position. Example: 45.1488228",
          "format": "double"
        },
        longtitude : {
          "type": "number",
          "description": "Longtitude of event position. Example: 38.1488228",
          "format": "double"
        }
    },
    {
        id : {
          "type": "integer",
          "description": 13,
          "format": "int32"
        },
        city: {
          "type": "array",
          "description": "city, where event is",
          "format": "int32",
          "xml": {
            "name": "Дніпро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/City"
          }
        },
        categories : {
          "type": "array",
          "description": "array of event categories",
          "xml": {
            "name": "IT",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/Category"
          }
        },
        name : {
          "type": "string",
          "description": "WEB с 0",
          "minLength": 5,
          "maxLength": 40
        },
        photoURL : {
          "type": "string",
          "description": "../image/minora.jpg"
        },
        descriptionEvent : {
          "type": "string",
          "description": "Description of current event",
          "maxLength": 900
        },
        date : {
          "type": "string",
          "description": "07/26/2017",
          "month": "Липня",
          "format": "date"
        },
        begin : {
          "type": "string",
          "description": "09:00",
          "format": "time"
        },
        end : {
          "type": "string",
          "description": "13:00",
          "format": "time"
        },
        latitude : {
          "type": "number",
          "description": "Latitude of event position. Example: 45.1488228",
          "format": "double"
        },
        longtitude : {
          "type": "number",
          "description": "Longtitude of event position. Example: 38.1488228",
          "format": "double"
        }
    },
    {
        id : {
          "type": "integer",
          "description": 14,
          "format": "int32"
        },
        city: {
          "type": "array",
          "description": "city, where event is",
          "format": "int32",
          "xml": {
            "name": "Дніпро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/City"
          }
        },
        categories : {
          "type": "array",
          "description": "array of event categories",
          "xml": {
            "name": "Гастро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/Category"
          }
        },
        name : {
          "type": "string",
          "description": "Мастер клас по готуванню шаверми",
          "minLength": 5,
          "maxLength": 40
        },
        photoURL : {
          "type": "string",
          "description": "../image/minora.jpg"
        },
        descriptionEvent : {
          "type": "string",
          "description": "Description of current event",
          "maxLength": 900
        },
        date : {
          "type": "string",
          "description": "07/28/2017",
          "month": "Липня",
          "format": "date"
        },
        begin : {
          "type": "string",
          "description": "08:00",
          "format": "time"
        },
        end : {
          "type": "string",
          "description": "20:00",
          "format": "time"
        },
        latitude : {
          "type": "number",
          "description": "Latitude of event position. Example: 45.1488228",
          "format": "double"
        },
        longtitude : {
          "type": "number",
          "description": "Longtitude of event position. Example: 38.1488228",
          "format": "double"
        }
    },
    {
        id : {
          "type": "integer",
          "description": 15,
          "format": "int32"
        },
        city: {
          "type": "array",
          "description": "city, where event is",
          "format": "int32",
          "xml": {
            "name": "Дніпро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/City"
          }
        },
        categories : {
          "type": "array",
          "description": "array of event categories",
          "xml": {
            "name": "Історичні",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/Category"
          }
        },
        name : {
          "type": "string",
          "description": "Прогулянка дніпром",
          "minLength": 5,
          "maxLength": 40
        },
        photoURL : {
          "type": "string",
          "description": "../image/minora.jpg"
        },
        descriptionEvent : {
          "type": "string",
          "description": "Description of current event",
          "maxLength": 900
        },
        date : {
          "type": "string",
          "description": "07/30/2017",
          "month": "Липня",
          "format": "date"
        },
        begin : {
          "type": "string",
          "description": "11:00",
          "format": "time"
        },
        end : {
          "type": "string",
          "description": "15:00",
          "format": "time"
        },
        latitude : {
          "type": "number",
          "description": "Latitude of event position. Example: 45.1488228",
          "format": "double"
        },
        longtitude : {
          "type": "number",
          "description": "Longtitude of event position. Example: 38.1488228",
          "format": "double"
        }
    },
    {
        id : {
          "type": "integer",
          "description": 16,
          "format": "int32"
        },
        city: {
          "type": "array",
          "description": "city, where event is",
          "format": "int32",
          "xml": {
            "name": "Дніпро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/City"
          }
        },
        categories : {
          "type": "array",
          "description": "array of event categories",
          "xml": {
            "name": "Історичні",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/Category"
          }
        },
        name : {
          "type": "string",
          "description": "Відвідання музеїв",
          "minLength": 5,
          "maxLength": 40
        },
        photoURL : {
          "type": "string",
          "description": "../image/minora.jpg"
        },
        descriptionEvent : {
          "type": "string",
          "description": "Description of current event",
          "maxLength": 900
        },
        date : {
          "type": "string",
          "description": "07/26/2017",
          "month": "Липня",
          "format": "date"
        },
        begin : {
          "type": "string",
          "description": "10:00",
          "format": "time"
        },
        end : {
          "type": "string",
          "description": "18:00",
          "format": "time"
        },
        latitude : {
          "type": "number",
          "description": "Latitude of event position. Example: 45.1488228",
          "format": "double"
        },
        longtitude : {
          "type": "number",
          "description": "Longtitude of event position. Example: 38.1488228",
          "format": "double"
        }
    },
    {
        id : {
          "type": "integer",
          "description": 18,
          "format": "int32"
        },
        city: {
          "type": "array",
          "description": "city, where event is",
          "format": "int32",
          "xml": {
            "name": "Дніпро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/City"
          }
        },
        categories : {
          "type": "array",
          "description": "array of event categories",
          "xml": {
            "name": "Гастро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/Category"
          }
        },
        name : {
          "type": "string",
          "description": "Ярмарка меду",
          "minLength": 5,
          "maxLength": 40
        },
        photoURL : {
          "type": "string",
          "description": "../image/minora.jpg"
        },
        descriptionEvent : {
          "type": "string",
          "description": "Description of current event",
          "maxLength": 900
        },
        date : {
          "type": "string",
          "description": "07/20/2017",
          "month": "Липня",
          "format": "date"
        },
        begin : {
          "type": "string",
          "description": "06:00",
          "format": "time"
        },
        end : {
          "type": "string",
          "description": "13:00",
          "format": "time"
        },
        latitude : {
          "type": "number",
          "description": "Latitude of event position. Example: 45.1488228",
          "format": "double"
        },
        longtitude : {
          "type": "number",
          "description": "Longtitude of event position. Example: 38.1488228",
          "format": "double"
        }
    },
    {
        id : {
          "type": "integer",
          "description": 19,
          "format": "int32"
        },
        city: {
          "type": "array",
          "description": "city, where event is",
          "format": "int32",
          "xml": {
            "name": "Дніпро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/City"
          }
        },
        categories : {
          "type": "array",
          "description": "array of event categories",
          "xml": {
            "name": "Інтелектуальні",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/Category"
          }
        },
        name : {
          "type": "string",
          "description": "Змагання з математики",
          "minLength": 5,
          "maxLength": 40
        },
        photoURL : {
          "type": "string",
          "description": "../image/minora.jpg"
        },
        descriptionEvent : {
          "type": "string",
          "description": "Description of current event",
          "maxLength": 900
        },
        date : {
          "type": "string",
          "description": "07/27/2017",
          "month": "Липня",
          "format": "date"
        },
        begin : {
          "type": "string",
          "description": "12:00",
          "format": "time"
        },
        end : {
          "type": "string",
          "description": "15:00",
          "format": "time"
        },
        latitude : {
          "type": "number",
          "description": "Latitude of event position. Example: 45.1488228",
          "format": "double"
        },
        longtitude : {
          "type": "number",
          "description": "Longtitude of event position. Example: 38.1488228",
          "format": "double"
        }
    },
    {
        id : {
          "type": "integer",
          "description": 20,
          "format": "int32"
        },
        city: {
          "type": "array",
          "description": "city, where event is",
          "format": "int32",
          "xml": {
            "name": "Дніпро",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/City"
          }
        },
        categories : {
          "type": "array",
          "description": "array of event categories",
          "xml": {
            "name": "Спорт",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/Category"
          }
        },
        name : {
          "type": "string",
          "description": "Марафон з бігу на 30км",
          "minLength": 5,
          "maxLength": 40
        },
        photoURL : {
          "type": "string",
          "description": "../image/minora.jpg"
        },
        descriptionEvent : {
          "type": "string",
          "description": "Description of current event",
          "maxLength": 900
        },
        date : {
          "type": "string",
          "description": "08/09/2017",
          "month": "Серпня",
          "format": "date"
        },
        begin : {
          "type": "string",
          "description": "08:00",
          "format": "time"
        },
        end : {
          "type": "string",
          "description": "12:00",
          "format": "time"
        },
        latitude : {
          "type": "number",
          "description": "Latitude of event position. Example: 45.1488228",
          "format": "double"
        },
        longtitude : {
          "type": "number",
          "description": "Longtitude of event position. Example: 38.1488228",
          "format": "double"
        }
    },
];
