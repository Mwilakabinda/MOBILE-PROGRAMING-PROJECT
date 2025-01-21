//package com.divine.icuonlinetimetable;
//
//import android.annotation.SuppressLint;
//import android.app.Activity;
//import android.os.Bundle;
//import android.webkit.WebChromeClient;
//import android.webkit.WebView;
//import android.webkit.WebViewClient;
//
//public class web extends Activity {
//
//    private WebView webView;
//
//    @SuppressLint({"SetJavaScriptEnabled", "MissingInflatedId"})
//    @Override
//    protected void onCreate(Bundle savedInstanceState) {
//        super.onCreate(savedInstanceState);
//        setContentView(R.layout.activity_main);
//
//        // Initialize WebView
//        webView = findViewById(R.id.webView);
//        webView.getSettings().setJavaScriptEnabled(true);
//
//        // Load URL
//        String urlToLoad = "http://icu-online-timetable.html-5.me/index.html"; // Replace with the URL you want to load
//        webView.loadUrl(urlToLoad);
//
//        // Enable JavaScript alert and confirm dialog
//        webView.setWebChromeClient(new WebChromeClient());
//
//        // Open links in WebView
//        webView.setWebViewClient(new WebViewClient());
//    }
//
//    // Handle back button press for WebView navigation
//    @Override
//    public void onBackPressed() {
//        if (webView.canGoBack()) {
//            webView.goBack();
//        } else {
//            super.onBackPressed();
//        }
//    }
//}



//For local offline

package com.mwila.icuonlinetimetable;

import android.annotation.SuppressLint;
import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.webkit.WebChromeClient;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Button;
import android.widget.Toast;

import com.google.firebase.auth.FirebaseAuth;

public class web2 extends Activity {

    private WebView webView;

    @SuppressLint({"SetJavaScriptEnabled", "MissingInflatedId"})
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView( R.layout.activity_web);
        Button homeBtn = findViewById(R.id.actionButton);
        homeBtn.setOnClickListener(v -> startActivity(new Intent(getApplicationContext(), MainActivity.class)));
        Toast.makeText(web2.this, "For admin login use: username=admin and password=admin1234.", Toast.LENGTH_LONG).show();
        Toast.makeText(web2.this, "For admin login use: username=admin and password=admin1234.", Toast.LENGTH_LONG).show();
        Toast.makeText(web2.this, "For admin login use: username=admin and password=admin1234.", Toast.LENGTH_LONG).show();
        Toast.makeText(web2.this, "For admin login use: username=admin and password=admin1234.", Toast.LENGTH_LONG).show();
        // Initialize WebView
        webView = findViewById(R.id.webView);
        webView.getSettings().setJavaScriptEnabled(true);
        WebSettings webSettings = webView.getSettings();
        webSettings.setJavaScriptEnabled(true);
        WebView.setWebContentsDebuggingEnabled(true);

        // Load local HTML file from the assets folder
        String urlToLoad = "http://icu-timetable-online.infy.uk/Admin/index.php"; // Replace with the URL you want to load
        webView.loadUrl(urlToLoad);
//
        webSettings.setAllowFileAccess(true);
        webSettings.setAllowContentAccess(true);
        // Enable JavaScript alert and confirm dialog
        webView.setWebChromeClient(new WebChromeClient());

        // Open links in WebView
        webView.setWebViewClient(new WebViewClient());
    }

    public void logout(View view) {
        FirebaseAuth.getInstance().signOut(); // Logout user
        startActivity(new Intent(getApplicationContext(), com.mwila.icuonlinetimetable.Login.class));
        finish();


    }


    // Handle back button press for WebView navigation
    @Override
    public void onBackPressed() {
        if (webView.canGoBack()) {
            webView.goBack();
        } else {
            super.onBackPressed();
        }
    }

}
