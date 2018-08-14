export default class Youtube {
    extractId(link = '') {
        const result = link.replace(/(>|<)/gi,'').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
        if(typeof(result[2]) !== undefined) {
            const id = result[2].split(/[^0-9a-z_\-]/i);
            return id.shift();
        }
        return result;
    }
}
