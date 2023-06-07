from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import unittest, time

class Webtest(unittest.TestCase):
    def setUp(self):
        self.options = webdriver.ChromeOptions()
        self.options.add_argument('ignore-certificate-errors')
        #open page
        self._driver = webdriver.Chrome(options=self.options)
    def test_login_user(self):
        driver = self._driver
        driver.get("https://localhost/food/login.php")
        driver.implicitly_wait(5)
        driver.maximize_window()

        #login in user mode
        username = driver.find_element(By.ID, "username")
        username.send_keys("yehfela")
        password = driver.find_element(By.ID, "password")
        password.send_keys("pw3068")
        login = driver.find_element(By.XPATH, '//*[@id="form"]/div[4]/a')
        login.click()
        #open up the login information
        heading = EC.url_contains("index.php")
        self.assertTrue(heading(driver))
    def test_login_admin(self):
        driver = self._driver
        driver.get("https://localhost/food/login.php")
        driver.implicitly_wait(5)
        driver.maximize_window()

        # login in admin mode
        username = driver.find_element(By.ID, "username")
        username.send_keys("root")
        password = driver.find_element(By.ID, "password")
        password.send_keys("toor")
        login = driver.find_element(By.XPATH, '//*[@id="form"]/div[4]/a')
        login.click()
        # open up the login information
        heading = EC.url_contains("admin-page.php")
        self.assertTrue(heading(driver))
    def tearDown(self):
        self._driver.quit()


if __name__ == '__main__':
    unittest.main()
