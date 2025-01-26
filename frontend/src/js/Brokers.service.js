export default class BrokerSerive {
  constructor(url) {
    this.url = url;
    this.route = "brokers";
  }

  async createBroker(content) {
    const response = await fetch(`${this.url}/${this.route}`, {
      method: "POST",
      headers: {
        "content-type": "application/json",
      },
      body: content,
    });
    try {
      if (!response.ok) {
        throw new Error(`Response erro: ${response.status}`);
      }
      const json = response.json();

      return json.data;
    } catch (error) {
      return error;
    }
  }

  async fetchData() {
    try {
      const response = await fetch(`${this.url}/${this.route}`, {
        method: "GET",
      });
      if (!response.ok) {
        throw new Error(`Response Error ${response.status}`);
      }
      const json = await response.json();
      return json.data;
    } catch (error) {
      return error;
    }
  }

  async deleteBroker(id) {
    const response = await fetch(`${this.url}/${this.route}/${id}`, {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
      },
    });

    try {
      if (!response.ok) {
        throw new Error(`Response error ${response.status}`);
      }

      const json = await response.json();
      return json.data;
    } catch (error) {
      return error;
    }
  }
  async updateBroker(id, content) {
    const response = await fetch(`${this.url}/${this.route}/${id}`, {
      method: "PUT",
      body: content,
    });

    try {
      if (!response.ok) {
        throw new Error(`Error to update user: ${response.status}`);
      }
      const json = await response.json();
      return json.data;
    } catch (error) {
      return error;
    }
  }

  async findOneBroker(id) {
    const response = fetch(`${this.url}/${this.route}/${id}`);

    try {
      if (!response.ok) {
        throw new Error(
          `Error find broker with status code: ${response.status}`
        );
      }
      const json = await response.json();

      return json.data;
    } catch (error) {
      return error;
    }
  }
  async findByCreci(creci) {
    const response = fetch(`${this.url}/${this.route}/${creci}`);

    try {
      if (!response.ok) {
        throw new Error(`Error status: ${response.status}`);
      }
      const json = await response.json();
      return json.data;
    } catch (error) {
      return error;
    }
  }
}
