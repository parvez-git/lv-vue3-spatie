export function richTextEditor() {

    const quillEditorOption {
            placeholder: 'Content goes here...',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{ header: 1 }, { header: 2 }],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    [{ script: 'sub' }, { script: 'super' }],
                    [{ header: [1, 2, 3, 4, 5, 6, false] }],
                    [{ color: [] }],
                    ['clean'],
                    ['link']
                ]
            },
        },

        return { quillEditorOption }
}