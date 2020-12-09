    var Ziggy = {
        namedRoutes: {
            "login": {
                "uri": "login",
                "methods": ["GET", "HEAD"],
                "domain": null
            },
            "generated::7V02gcZvzlOV4iob": {
                "uri": "login",
                "methods": ["POST"],
                "domain": null
            },
            "two-factor.login": {
                "uri": "two-factor-challenge",
                "methods": ["GET", "HEAD"],
                "domain": null
            },
            "generated::lQsHg8TfgGKD7EGN": {
                "uri": "two-factor-challenge",
                "methods": ["POST"],
                "domain": null
            },
            "logout": {
                "uri": "logout",
                "methods": ["POST"],
                "domain": null
            },
            "password.request": {
                "uri": "forgot-password",
                "methods": ["GET", "HEAD"],
                "domain": null
            },
            "password.email": {
                "uri": "forgot-password",
                "methods": ["POST"],
                "domain": null
            },
            "password.reset": {
                "uri": "reset-password\/{token}",
                "methods": ["GET", "HEAD"],
                "domain": null
            },
            "password.update": {
                "uri": "reset-password",
                "methods": ["POST"],
                "domain": null
            },
            "generated::0gRqnzJbEcDHGWOA": {
                "uri": "user\/profile-information",
                "methods": ["PUT"],
                "domain": null
            },
            "generated::WAnZUHjh3jgXNshm": {
                "uri": "user\/password",
                "methods": ["PUT"],
                "domain": null
            },
            "generated::jUFjtBX1mIgKzz4d": {
                "uri": "user\/two-factor-authentication",
                "methods": ["POST"],
                "domain": null
            },
            "generated::msyXFMjRq85ZcCT6": {
                "uri": "user\/two-factor-authentication",
                "methods": ["DELETE"],
                "domain": null
            },
            "generated::PcEPvgOB9xnVx1ZU": {
                "uri": "user\/two-factor-qr-code",
                "methods": ["GET", "HEAD"],
                "domain": null
            },
            "generated::FsXKkvfYcKd7LK2p": {
                "uri": "user\/two-factor-recovery-codes",
                "methods": ["GET", "HEAD"],
                "domain": null
            },
            "generated::xMpFmsh8MhP1G2ds": {
                "uri": "user\/two-factor-recovery-codes",
                "methods": ["POST"],
                "domain": null
            },
            "profile.show": {
                "uri": "user\/profile",
                "methods": ["GET", "HEAD"],
                "domain": null
            },
            "other-browser-sessions.destroy": {
                "uri": "user\/other-browser-sessions",
                "methods": ["DELETE"],
                "domain": null
            },
            "current-user.destroy": {
                "uri": "user",
                "methods": ["DELETE"],
                "domain": null
            },
            "generated::z00sAR80v4dcJoYv": {
                "uri": "sanctum\/csrf-cookie",
                "methods": ["GET", "HEAD"],
                "domain": null
            },
            "generated::Y3zmhlwhozgv9QBa": {
                "uri": "\/",
                "methods": ["GET", "HEAD"],
                "domain": null
            },
            "dash": {
                "uri": "dashboard",
                "methods": ["GET", "HEAD"],
                "domain": null
            },
            "lead.create": {
                "uri": "leads\/add",
                "methods": ["GET", "HEAD"],
                "domain": null
            },
            "lead.save": {
                "uri": "leads\/save",
                "methods": ["POST"],
                "domain": null
            },
            "lead.list": {
                "uri": "leads\/list",
                "methods": ["GET", "HEAD"],
                "domain": null
            },
            "lead.view": {
                "uri": "leads\/view\/{lead}",
                "methods": ["GET", "HEAD"],
                "domain": null
            },
            "lead.update": {
                "uri": "leads\/update",
                "methods": ["PUT"],
                "domain": null
            },
            "lead.delete": {
                "uri": "leads\/view\/{lead}",
                "methods": ["DELETE"],
                "domain": null
            },
            "subscriber.list": {
                "uri": "subscribers\/list",
                "methods": ["GET", "HEAD"],
                "domain": null
            },
            "lead.subscribe": {
                "uri": "leads\/subscribe\/{lead}",
                "methods": ["GET", "HEAD"],
                "domain": null
            },
            "lead.subscribe.add": {
                "uri": "leads\/subscribe\/save",
                "methods": ["POST"],
                "domain": null
            },
            "reminder.add": {
                "uri": "leads\/view\/{lead}\/reminder\/add",
                "methods": ["GET", "HEAD"],
                "domain": null
            },
            "reminder.save": {
                "uri": "leads\/view\/reminder\/save",
                "methods": ["POST"],
                "domain": null
            },
            "reminder.update": {
                "uri": "leads\/view\/reminder\/update",
                "methods": ["PUT"],
                "domain": null
            },
            "reminder.view": {
                "uri": "leads\/view\/{lead}\/reminder\/{reminder}\/view",
                "methods": ["GET", "HEAD"],
                "domain": null
            },
            "reminder.delete": {
                "uri": "leads\/view\/reminder\/{reminder}",
                "methods": ["DELETE"],
                "domain": null
            },
            "generated::5ygcdH1TWErWxNoc": {
                "uri": "api\/user",
                "methods": ["GET", "HEAD"],
                "domain": null
            }
        },
        baseUrl: 'http://localhost:8001/',
        baseProtocol: 'http',
        baseDomain: '/ocalhost:8001',
        basePort: false,
        defaultParameters: []
    };

    if(typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
        for(var name in window.Ziggy.namedRoutes) {
            Ziggy.namedRoutes[name] = window.Ziggy.namedRoutes[name];
        }
    }

    export {
        Ziggy
    }