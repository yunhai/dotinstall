export default class Youtube {
    extractId(link = '', type) {
        let result;
        if (type == 3) {
            result = link.split(/video\/|http:\/\/vimeo\.com\//);
            if (result[1]) {
                return result[1];
            }
            return '';
        }

        if (type == 1) {
            result = link.replace(/(>|<)/gi,'').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
            if(result[2]) {
                const id = result[2].split(/[^0-9a-z_\-]/i);
                return id.shift();
            }
            return '';
        }
        return '';
    }
}

