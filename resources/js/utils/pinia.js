
export const authPlugin = (context) => {
    const auth = context.app.config.globalProperties.$page.props.auth;
    return {
        auth: {
            user: auth,
            login: false
        }
    }
}
