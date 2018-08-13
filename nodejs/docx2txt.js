const textract = require('textract');
const fs = require('fs');

const args = process.argv.slice(2);
const input = args[0];

const option = {
    preserveLineBreaks: true,
    preserveOnlyMultipleLineBreaks: false
}

textract.fromFileWithPath(input, option, function(error, text) {
    console.log(text);
});
